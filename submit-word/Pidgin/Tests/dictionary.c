# define PURPLE_PLUGINS

#include "internal.h"
#include "pidgin.h"

#include "debug.h"
#include "prefs.h"
#include "signals.h"
#include "version.h"

#include "gtkconv.h"
#include "gtkplugin.h"
#include "gtkutils.h"

#include "gtkimhtml.h"

static guint signal_id;
static gulong hook_id;
static PidginConversation *curconv;


static void
GetActiveConversation(PidginConversation **conv)
{
  GList *windows;

  /* Attach to existing conversations */
  for (windows = pidgin_conv_windows_get_list(); windows != NULL; windows = windows->next)
  {
    PidginWindow *CurrentWindow = (PidginWindow*)windows->data;
    if(pidgin_conv_window_has_focus(CurrentWindow)){
      *conv = pidgin_conv_window_get_active_gtkconv(CurrentWindow);
      return;
    }
  }
  *conv = NULL;
}

/*static gchar*
get_word (PidginConversation *gtkconv)
{


    //curconv = gtkconv;
    /*GtkTextBuffer *buffer = imhtml->text_buffer;
    GtkTextIter start, *pstart = &start, end, *pend = &end;
    gchar *pBuf = "";*/

    /*if ( gtk_text_buffer_get_selection_bounds ( buffer, pstart, pend )) {
        GtkTextBuffer *tmpbuf = gtk_text_buffer_new(gtk_text_buffer_get_tag_table(buffer));

        gtk_text_buffer_get_bounds(tmpbuf, pstart, pend);
        pBuf = g_strdup_printf("%s", gtk_text_buffer_get_text(tmpbuf, pstart, pend, FALSE));
    }
    //pBuf = "Aoleu!";
    return text;
}*/

static gboolean
menu_cb (GtkWidget *item, gpointer data)
{
    PurplePlugin *plugin = data;
    PidginConversation *gtkconv;

    GetActiveConversation(&curconv);
        if(curconv == NULL){

        purple_notify_message (purple_notify_get_handle(), PURPLE_NOTIFY_MSG_INFO, "test", "A scos NULL", NULL, NULL, NULL);
        return;
    }

    //GtkIMHtml *imhtml = GTK_IMHTML (curconv->imhtml);
   // purple_signal_connect(purple_conversations_get_handle(), "conversation-created", G_CALLBACK(get_word), NULL);
    //gchar *aux =get_word(gtkconv);
 /*   if( curconv->imhtml == NULL){
        purple_notify_message (purple_notify_get_handle(), PURPLE_NOTIFY_MSG_INFO, "test", "A scos NULL", NULL, NULL, NULL);
        return TRUE;
    }*/

    purple_notify_message (purple_notify_get_handle(), PURPLE_NOTIFY_MSG_INFO, "test", "This is a test", NULL, NULL, NULL);


    return TRUE;
}

static gboolean
add_menu_item_cb (GSignalInvocationHint *hint, guint n_params, const GValue *pvalues, gpointer data)
{

    GtkTextView *view = GTK_TEXT_VIEW(g_value_get_object(pvalues));
    GtkTextBuffer *buffer = gtk_text_view_get_buffer (view);
    GtkTextMark *  start =  gtk_text_buffer_get_selection_bound (buffer);
    GtkTextMark *  stop =  gtk_text_buffer_get_insert (buffer);
    GtkTextIter * startIter;
    GtkTextIter * stopIter;
    gtk_text_buffer_get_iter_at_mark(buffer, startIter, start);
    gtk_text_buffer_get_iter_at_mark(buffer, stopIter, stop);
    gchar * text = gtk_text_buffer_get_text (buffer, startIter, stopIter, FALSE);

    GtkWidget *menu, *item;
    PurplePlugin *plugin = data;

	if (!GTK_IS_IMHTML(view))
		return TRUE;


    menu = g_value_get_object(&pvalues[1]);
    item = gtk_menu_item_new_with_label(_("Pretty Button"));


	gtk_widget_show_all(item);
    g_signal_connect(G_OBJECT(item), "activate", G_CALLBACK(menu_cb), text);
	gtk_menu_shell_insert(GTK_MENU_SHELL(menu), item, 7);
	purple_notify_message (purple_notify_get_handle(), PURPLE_NOTIFY_MSG_INFO, "test", text, NULL, NULL, NULL);

	return TRUE;
}

static void
init_plugin (PurplePlugin *plugin)
{

}

static gboolean
plugin_load (PurplePlugin *plugin)
{


    g_signal_parse_name("populate_popup", GTK_TYPE_TEXT_VIEW, &signal_id, NULL, FALSE);

	hook_id = g_signal_add_emission_hook(signal_id, 0, add_menu_item_cb, plugin, NULL);

   /* GetActiveConversation(&curconv);
        if(curconv == NULL){
    //purple_debug_error("test","No active Conversation found\n");
        purple_notify_message (purple_notify_get_handle(), PURPLE_NOTIFY_MSG_INFO, "test", "A scos NULL", NULL, NULL, NULL);
        return;
    }*/


    return TRUE;
}

static PurplePluginInfo info = {
    PURPLE_PLUGIN_MAGIC,
    PURPLE_MAJOR_VERSION,
    PURPLE_MINOR_VERSION,
    PURPLE_PLUGIN_STANDARD,

    NULL,
    0,
    NULL,

    PURPLE_PRIORITY_DEFAULT,

    "test_plugin",
    "test",
    "1.1",

    "Test plugin",
    "Just a test plugin",

    "Laura Chelaru <chelaru.laura91@gmail.com",
    "not yet....",

    plugin_load,

    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
};

PURPLE_INIT_PLUGIN ( test, init_plugin, info )
