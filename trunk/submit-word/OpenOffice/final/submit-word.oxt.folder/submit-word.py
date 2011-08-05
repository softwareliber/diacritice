# coding: utf-8
# Author: Adrian Belgun


import uno
import unohelper
import httplib

from com.sun.star.task import XJob
from com.sun.star.ui import XContextMenuInterceptor
from com.sun.star.beans import XPropertySet
from com.sun.star.frame import XDispatchProvider, XDispatch
from com.sun.star.lang import XServiceInfo, XInitialization

 
# handled protocol by this component
HANDLED_PROTOCOL = "ro.i18n.submitword.handler:"
# implementation name of this component
PROTOCOLHANDLER_IMPLEMENTATIONNAME = "ro.i18n.submitword.ContextMenuHandler"


SvMgr = uno.getComponentContext().ServiceManager
xDesktop = None

def writeLog(s = 'empty'):
	return 
	log = open("D:\\log1.txt","a")
	log.write(s+"\n")
	log.close()
	
def submitWord(word):
	try:
		#writeLog("Trimitem " + word)
		conn = httplib.HTTPConnection("i18n.ro")
		conn.request("GET","/submit-word/word_add.php?word=%s" % word)
		conn.close()
		#writeLog("Am trimis " + word)
	except Exception as inst:
		writeLog("Unknown error, exiting: %s" % inst)
	
def getDocument ():
    global xDesktop
    return xDesktop.getCurrentComponent()
	
def getWord():
    xDoc = getDocument()
    xText = xDoc.Text
    xViewCursor = xDoc.CurrentController.ViewCursor
    xCursor = xText.createTextCursorByRange(xViewCursor)
    xCursor.gotoStartOfWord(False)
    xCursor.gotoEndOfWord(True)
    return xCursor.String.strip('.')

class DocContextMenuHandler(XContextMenuInterceptor, unohelper.Base):
	def __init__(self, ctx):
		self.ctx = ctx
		global SvMgr
		self.xStore = SvMgr.createInstance("com.sun.star.ucb.Store") #OK
		self.xPropertySetRegistry = self.xStore.createPropertySetRegistry("") #OK
	def notifyContextMenuExecute(self, ev):
		try:
			word = getWord()
			if word == '':
				return uno.getConstantByName("com.sun.star.ui.ContextMenuInterceptorAction.IGNORED")
				
			# Retrieve context menu container and query for service factory to create sub menus, menu entries and separators
			xContextMenu = ev.ActionTriggerContainer
			xMenuElementFactory = xContextMenu 
			
			if (xMenuElementFactory):
				# create a line separator
				xSeparator = xMenuElementFactory.createInstance("com.sun.star.ui.ActionTriggerSeparator")
				xSeparator.SeparatorType = uno.getConstantByName("com.sun.star.ui.ActionTriggerSeparatorType.LINE")
				
				# create root menu entry
				xRootMenuEntry = self.createMenuEntry('Submit \"' + word + '\"', HANDLED_PROTOCOL + word)
				
				# add separator into the given context menu
				xContextMenu.insertByIndex(0, xSeparator)
				# add new sub menu into the given context menu
				xContextMenu.insertByIndex(0, xRootMenuEntry)
		except Exception as inst:
			writeLog("Unknown error, exiting: %s" % inst)		
		return uno.getConstantByName("com.sun.star.ui.ContextMenuInterceptorAction.EXECUTE_MODIFIED")

	def createMenuEntry (self, sText, sCommandURL='', sHelpURL=''):
		sInternalName = 'RosEduSubmitWord_' 
		if self.xPropertySetRegistry.hasByName(sInternalName) :
			self.xPropertySetRegistry.removePropertySet(sInternalName)
		xPersistentPropertySet = self.xPropertySetRegistry.openPropertySet(sInternalName, True)
		xPersistentPropertySet.addProperty("Text", 0, sText)
		xPersistentPropertySet.addProperty("CommandURL", 0, sCommandURL)
		#if not IsMissing(sHelpURL) : xPersistentPropertySet.addProperty("HelpURL", 0, sHelpURL)
		return xPersistentPropertySet


class JobExecutor(unohelper.Base,
	XJob, 
	XDispatch,
	XDispatchProvider,
	XServiceInfo,
	XInitialization):
	def __init__(self, ctx):
		#print("initiated.")
		self.ctx = ctx
		
		global xDesktop
		xDesktop = self.ctx.getServiceManager().createInstanceWithContext('com.sun.star.frame.Desktop', self.ctx)
	
	#XJob
	def execute(self, args):
		if not args: return
		correctEvent = False
		for arg in args:
			if arg.Name == "Environment":
				value = arg.Value
				for v in value:
					if v.Name == "EnvType" and v.Value == "DOCUMENTEVENT":
						correctEvent = True
					elif v.Name == "EventName":
						pass # check is correct event
						#print("Event: %s" % v.Value)
					elif v.Name == "Model":
						model = v.Value
		if correctEvent:
			if model.supportsService("com.sun.star.text.TextDocument"):
				controller = model.getCurrentController()
				if controller:
					controller.registerContextMenuInterceptor(DocContextMenuHandler(self.ctx))
					#print("registered.")
					
	# XInitialization
	def initialize(self,objects):
		if len(objects) > 0:
			self.frame = objects[0]
		return
	
	# XDispatchProvider
	def queryDispatch(self,aURL,name,flag):
		dispatch = None
		if aURL.Protocol == HANDLED_PROTOCOL:
			return self
		return None

	# XDispatchProvider
	def queryDispatches(self,descs):
		dispatchers = []
		for desc in descs:
			dispatchers.append(
				self.queryDispatch(desc.FeatureURL,desc.FrameName,desc.SearchFlags))
		return tuple(dispatchers)

	# XDispatch
	# do dispatch when control actioned
	def dispatch(self,aURL,args):
		if aURL.Protocol == HANDLED_PROTOCOL:
			submitWord(aURL.Path)
		return
		
	# XDispatch
	# this is called when the toolbar is instantiated
	def addStatusListener(self,xControl,aURL):
		return
		
	# XDispatch
	def removeStatusListener(self,xControl,aURL):
		return
		
	# XServiceInfo
	def supportsService(self,name):
		return (name == "com.sun.star.frame.ProtocolHandler")
		
	# XServiceInfo
	def getImplementationName(self):
		return PROTOCOLHANDLER_IMPLEMENTATIONNAME
		
	# XServiceInfo
	def getSupportedServiceNames(self):
		return ("com.sun.star.frame.ProtocolHandler",)


g_ImplementationHelper = unohelper.ImplementationHelper()
g_ImplementationHelper.addImplementation(
	JobExecutor,
	PROTOCOLHANDLER_IMPLEMENTATIONNAME, (PROTOCOLHANDLER_IMPLEMENTATIONNAME,),)

