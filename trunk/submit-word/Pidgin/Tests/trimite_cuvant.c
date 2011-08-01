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
static GtkTextView *view;


/* Functie pentru gasirea cuvantului selectat */

static gchar*
get_word ()
{

    GtkTextBuffer *buffer = gtk_text_view_get_buffer (view);
    GtkTextMark *start =  gtk_text_buffer_get_selection_bound (buffer);
    GtkTextMark *stop =  gtk_text_buffer_get_insert (buffer);
    GtkTextIter startIter;
    GtkTextIter stopIter;
    gtk_text_buffer_get_iter_at_mark(buffer, &startIter, start);
    gtk_text_buffer_get_iter_at_mark(buffer, &stopIter, stop);
    gchar *text = gtk_text_buffer_get_text (buffer, &startIter, &stopIter, FALSE);

    return text;
}

/* Functia apelata atunci cand se apasa butonul din meniul contextual */

static gboolean
menu_cb (GtkWidget *item, gpointer data)
{
    PurplePlugin *plugin = data;
    PidginConversation *gtkconv;

    gchar *text = get_word();

    purple_notify_message (purple_notify_get_handle(), PURPLE_NOTIFY_MSG_INFO, "trimite_cuvant", text, NULL, NULL, NULL);


    return TRUE;
}

/* Adauga o intrare noua in meniul contextual */

static gboolean
add_menu_item_cb (GSignalInvocationHint *hint, guint n_params, const GValue *pvalues, gpointer data)
{

    view = GTK_TEXT_VIEW(g_value_get_object(pvalues));


    GtkWidget *menu, *item;
    PurplePlugin *plugin = data;

	if (!GTK_IS_IMHTML(view))
		return TRUE;


    menu = g_value_get_object(&pvalues[1]);
    item = gtk_menu_item_new_with_label(_("Pretty Button"));


	gtk_widget_show_all(item);
    g_signal_connect(G_OBJECT(item), "activate", G_CALLBACK(menu_cb), data);
	gtk_menu_shell_insert(GTK_MENU_SHELL(menu), item, 5);

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

    "trimite_cuvant",
    "Trimite cuvant",
    "1.1",

    "Trimite un cuvant selectat la ",
    "Plug-inul va trimite un cuvant selectat la adresa " " petru a fi folosit ulterior pentru dictionare de spellcheaker viitoare",

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
