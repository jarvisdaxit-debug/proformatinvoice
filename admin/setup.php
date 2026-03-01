<?php
require_once DOL_DOCUMENT_ROOT.'/main.inc.php';
require_once DOL_DOCUMENT_ROOT.'/core/lib/admin.lib.php';
require_once DOL_DOCUMENT_ROOT.'/core/class/html.form.class.php';
dol_include_once('/proformatinvoice/lib/proformatinvoice.lib.php');

$langs->loadLangs(array("admin", "proformatinvoice@proformatinvoice"));

if (!$user->admin) {
    accessforbidden();
}

$action = GETPOST('action', 'aZ09');
$value = GETPOST('value', 'alpha');

// Save configuration
if ($action == 'setvar') {
    $template = GETPOST('PROFORMAINVOICE_TEMPLATE', 'alpha');
    $email_subject = GETPOST('PROFORMAINVOICE_EMAIL_SUBJECT', 'alpha');
    
    dolibarr_set_const($db, 'PROFORMAINVOICE_TEMPLATE', $template, 'chaine', 0, '', $conf->entity);
    dolibarr_set_const($db, 'PROFORMAINVOICE_EMAIL_SUBJECT', $email_subject, 'chaine', 0, '', $conf->entity);
    
    setEventMessages($langs->trans("SetupSaved"), null, 'mesgs');
    header("Location: ".$_SERVER["PHP_SELF"]);
    exit;
}

llxHeader('', $langs->trans("ProFormaInvoiceSetup"));

$linkback = '<a href="'.DOL_URL_ROOT.'/admin/modules.php?restore_lastsearch_values=1">'.$langs->trans("BackToModuleList").'</a>';
print load_fiche_titre($langs->trans("ProFormaInvoiceSetup"), $linkback, 'title_setup');

$head = proformatinvoiceAdminPrepareHead();
print dol_get_fiche_head($head, 'settings', $langs->trans("ProFormaInvoiceSetup"), -1, 'bill');

print '<form method="POST" action="'.$_SERVER["PHP_SELF"].'">';
print '<input type="hidden" name="token" value="'.newToken().'">';
print '<input type="hidden" name="action" value="setvar">';

print '<table class="noborder centpercent">';
print '<tr class="liste_titre">';
print '<td>'.$langs->trans("Parameter").'</td>';
print '<td>'.$langs->trans("Value").'</td>';
print '</tr>';

// Template
print '<tr class="oddeven">';
print '<td>'.$langs->trans("ProFormaInvoiceTemplate").'</td>';
print '<td>';
print '<input type="text" name="PROFORMAINVOICE_TEMPLATE" value="'.getDolGlobalString('PROFORMAINVOICE_TEMPLATE', 'default').'" class="minwidth300">';
print '</td>';
print '</tr>';

// Email subject
print '<tr class="oddeven">';
print '<td>'.$langs->trans("ProFormaInvoiceEmailSubject").'</td>';
print '<td>';
print '<input type="text" name="PROFORMAINVOICE_EMAIL_SUBJECT" value="'.getDolGlobalString('PROFORMAINVOICE_EMAIL_SUBJECT', 'Proforma Invoice').'" class="minwidth300">';
print '</td>';
print '</tr>';

print '</table>';

print '<div class="center">';
print '<input type="submit" class="button button-save" value="'.$langs->trans("Save").'">';
print '</div>';

print '</form>';

print dol_get_fiche_end();

llxFooter();
$db->close();
