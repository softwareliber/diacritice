package org.openoffice.adrianbelgun.i18n.simple.comp;

import java.io.File;
import java.io.FileNotFoundException;
import java.io.PrintStream;

import com.sun.star.beans.XPropertySet;
import com.sun.star.document.XEventBroadcaster;
import com.sun.star.frame.XController;
import com.sun.star.frame.XDesktop;
import com.sun.star.frame.XModel;
import com.sun.star.lang.XComponent;
import com.sun.star.lang.XSingleComponentFactory;
import com.sun.star.lib.uno.helper.Factory;
import com.sun.star.lib.uno.helper.WeakBase;
import com.sun.star.registry.XRegistryKey;
import com.sun.star.text.XTextDocument;
import com.sun.star.ui.ActionTriggerSeparatorType;
import com.sun.star.ui.XContextMenuInterception;
import com.sun.star.uno.Exception;
import com.sun.star.uno.UnoRuntime;
import com.sun.star.uno.XComponentContext;

public final class SimpleMenuImpl extends WeakBase implements
		org.openoffice.adrianbelgun.i18n.simple.XSimpleMenu,
		com.sun.star.lang.XServiceInfo {
	private final XComponentContext m_xContext;
	private static final String m_implementationName = SimpleMenuImpl.class
			.getName();
	private static final String[] m_serviceNames = { "org.openoffice.adrianbelgun.i18n.simple.SimpleMenu" };

	public SimpleMenuImpl(XComponentContext context) {
		m_xContext = context;
		try {
			PrintStream out = new PrintStream(new File("D:\\constructor.txt"));
			out.println("Test");
			out.close();
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		}
		try {
			Object GEBC = null;
			GEBC = m_xContext.getServiceManager().createInstanceWithContext(
					"com.sun.star.frame.GlobalEventBroadcaster", m_xContext);
			XEventBroadcaster xEVBC = (XEventBroadcaster) UnoRuntime
					.queryInterface(XEventBroadcaster.class, GEBC);
			xEVBC.addEventListener(this);
		} catch (Exception e) {
			e.printStackTrace();
		}
	};

	public static XSingleComponentFactory __getComponentFactory(
			String sImplementationName) {
		XSingleComponentFactory xFactory = null;

		if (sImplementationName.equals(m_implementationName))
			xFactory = Factory.createComponentFactory(SimpleMenuImpl.class,
					m_serviceNames);
		return xFactory;
	}

	public static boolean __writeRegistryServiceInfo(XRegistryKey xRegistryKey) {
		return Factory.writeRegistryServiceInfo(m_implementationName,
				m_serviceNames, xRegistryKey);
	}

	// com.sun.star.lang.XEventListener:
	public void disposing(com.sun.star.lang.EventObject Source) {
		// TODO: Insert your implementation for "disposing" here.
	}

	// com.sun.star.document.XEventListener:
	public void notifyEvent(com.sun.star.document.EventObject Event) {
		try {
			PrintStream out = new PrintStream(new File("D:\\event\\1"
					+ Event.EventName + ".txt"));
			out.println("Test");
			out.close();
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		}
		if (Event.EventName.contentEquals("OnLoadFinished")) {
			try {
				PrintStream out = new PrintStream(new File("D:\\onLoad.txt"));
				out.println("Test");
				out.close();
			} catch (FileNotFoundException e) {
				e.printStackTrace();
			}
			Object desktop;
			try {
				desktop = m_xContext.getServiceManager()
						.createInstanceWithContext(
								"com.sun.star.frame.Desktop", m_xContext);

				XDesktop xDesktop = (XDesktop) UnoRuntime.queryInterface(
						XDesktop.class, desktop);
				// retrieve the current component
				XComponent xCurrentComponent = xDesktop.getCurrentComponent();
				// query its XTextDocument interface
				XTextDocument xTextDocument = (XTextDocument) UnoRuntime
						.queryInterface(XTextDocument.class, xCurrentComponent);
				// get the XModel interface from the component
				XModel xModel = (XModel) UnoRuntime.queryInterface(
						XModel.class, xTextDocument);
				// the model knows its controller
				XController xController = xModel.getCurrentController();
				XContextMenuInterception xCTMIntercept = (XContextMenuInterception) UnoRuntime
						.queryInterface(XContextMenuInterception.class,
								xController);
				xCTMIntercept.registerContextMenuInterceptor(this);
			} catch (Exception e) {
				e.printStackTrace();
			}
		}
	}

	// com.sun.star.ui.XContextMenuInterceptor:
	public com.sun.star.ui.ContextMenuInterceptorAction notifyContextMenuExecute(
			com.sun.star.ui.ContextMenuExecuteEvent aEvent) {
		try {
			PrintStream out = new PrintStream(new File("D:\\notifyContext.txt"));
			out.println("Test");
			out.close();
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		}
		try {
			// Retrieve context menu container and query for service factory to
			// create sub menus, menu entries and separators
			com.sun.star.container.XIndexContainer xContextMenu = aEvent.ActionTriggerContainer;
			com.sun.star.lang.XMultiServiceFactory xMenuElementFactory = (com.sun.star.lang.XMultiServiceFactory) UnoRuntime
					.queryInterface(
							com.sun.star.lang.XMultiServiceFactory.class,
							xContextMenu);
			if (xMenuElementFactory != null) {
				// create root menu entry for sub menu and sub menu
				com.sun.star.beans.XPropertySet xRootMenuEntry = (XPropertySet) UnoRuntime
						.queryInterface(
								com.sun.star.beans.XPropertySet.class,
								xMenuElementFactory
										.createInstance("com.sun.star.ui.ActionTrigger"));

				// create a line separator for our new help sub menu
				com.sun.star.beans.XPropertySet xSeparator = (com.sun.star.beans.XPropertySet) UnoRuntime
						.queryInterface(
								com.sun.star.beans.XPropertySet.class,
								xMenuElementFactory
										.createInstance("com.sun.star.ui.ActionTriggerSeparator"));

				Short aSeparatorType = new Short(
						ActionTriggerSeparatorType.LINE);
				xSeparator.setPropertyValue("SeparatorType",
						(Object) aSeparatorType);

				// query sub menu for index container to get access
				com.sun.star.container.XIndexContainer xSubMenuContainer = (com.sun.star.container.XIndexContainer) UnoRuntime
						.queryInterface(
								com.sun.star.container.XIndexContainer.class,
								xMenuElementFactory
										.createInstance("com.sun.star.ui.ActionTriggerContainer"));

				// intialize root menu entry "Help"
				xRootMenuEntry.setPropertyValue("Text", new String("Help"));
				xRootMenuEntry.setPropertyValue("CommandURL", new String(
						"slot:5410"));
				xRootMenuEntry.setPropertyValue("HelpURL", new String("5410"));
				xRootMenuEntry.setPropertyValue("SubContainer",
						(Object) xSubMenuContainer);

				// create menu entries for the new sub menu

				// intialize help/content menu entry
				// entry "Content"
				XPropertySet xMenuEntry = (XPropertySet) UnoRuntime
						.queryInterface(
								XPropertySet.class,
								xMenuElementFactory
										.createInstance("com.sun.star.ui.ActionTrigger"));

				xMenuEntry.setPropertyValue("Text", new String("Content"));
				xMenuEntry.setPropertyValue("CommandURL", new String(
						"slot:5401"));
				xMenuEntry.setPropertyValue("HelpURL", new String("5401"));

				// insert menu entry to sub menu
				xSubMenuContainer.insertByIndex(0, (Object) xMenuEntry);

				// intialize help/help agent
				// entry "Help Agent"
				xMenuEntry = (com.sun.star.beans.XPropertySet) UnoRuntime
						.queryInterface(
								com.sun.star.beans.XPropertySet.class,
								xMenuElementFactory
										.createInstance("com.sun.star.ui.ActionTrigger"));
				xMenuEntry.setPropertyValue("Text", new String("Help Agent"));
				xMenuEntry.setPropertyValue("CommandURL", new String(
						"slot:5962"));
				xMenuEntry.setPropertyValue("HelpURL", new String("5962"));

				// insert menu entry to sub menu
				xSubMenuContainer.insertByIndex(1, (Object) xMenuEntry);

				// intialize help/tips
				// entry "Tips"
				xMenuEntry = (com.sun.star.beans.XPropertySet) UnoRuntime
						.queryInterface(
								com.sun.star.beans.XPropertySet.class,
								xMenuElementFactory
										.createInstance("com.sun.star.ui.ActionTrigger"));
				xMenuEntry.setPropertyValue("Text", new String("Tips"));
				xMenuEntry.setPropertyValue("CommandURL", new String(
						"slot:5404"));
				xMenuEntry.setPropertyValue("HelpURL", new String("5404"));

				// insert menu entry to sub menu
				xSubMenuContainer.insertByIndex(2, (Object) xMenuEntry);

				// add separator into the given context menu
				xContextMenu.insertByIndex(0, (Object) xSeparator);

				// add new sub menu into the given context menu
				xContextMenu.insertByIndex(0, (Object) xRootMenuEntry);

				// The controller should execute the modified context menu and
				// stop notifying other
				// interceptors.
				return com.sun.star.ui.ContextMenuInterceptorAction.EXECUTE_MODIFIED;
			}
		} catch (com.sun.star.beans.UnknownPropertyException ex) {
			// do something useful
			// we used a unknown property
		} catch (com.sun.star.lang.IndexOutOfBoundsException ex) {
			// do something useful
			// we used an invalid index for accessing a container
		} catch (com.sun.star.uno.Exception ex) {
			// something strange has happend!
		} catch (java.lang.Throwable ex) {
			// catch java exceptions - do something useful
		}

		return com.sun.star.ui.ContextMenuInterceptorAction.IGNORED;
	}

	// com.sun.star.lang.XServiceInfo:
	public String getImplementationName() {
		return m_implementationName;
	}

	public boolean supportsService(String sService) {
		int len = m_serviceNames.length;

		for (int i = 0; i < len; i++) {
			if (sService.equals(m_serviceNames[i]))
				return true;
		}
		return false;
	}

	public String[] getSupportedServiceNames() {
		return m_serviceNames;
	}

	public static void main(String[] args) {
		try {
			PrintStream out = new PrintStream(new File("D:\\main.txt"));
			out.println("Test");
			out.close();
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		}
	}

}
