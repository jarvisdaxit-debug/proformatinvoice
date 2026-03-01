<?php
require_once DOL_DOCUMENT_ROOT.'/main.inc.php';
require_once DOL_DOCUMENT_ROOT.'/core/lib/admin.lib.php';

$langs->loadLangs(array("admin", "proformatinvoice@proformatinvoice"));

if (!$user->admin) {
    accessforbidden();
}

llxHeader('', $langs->trans("About"));

$linkback = '<a href="'.DOL_URL_ROOT.'/admin/modules.php?restore_lastsearch_values=1">'.$langs->trans("BackToModuleList").'</a>';
print load_fiche_titre($langs->trans("ProFormaInvoiceSetup"), $linkback, 'title_setup');

$head = proformatinvoiceAdminPrepareHead();
print dol_get_fiche_head($head, 'about', $langs->trans("ProFormaInvoiceSetup"), -1, 'bill');

print '<table class="noborder centpercent">';
print '<tr class="liste_titre">';
print '<td>'.$langs->trans("Parameter").'</td>';
print '<td>'.$langs->trans("Value").'</td>';
print '</tr>';

print '<tr class="oddeven">';
print '<td>'.$langs->trans("ModuleName").'</td>';
print '<td>ProFormaInvoice</td>';
print '</tr>';

print '<tr class="oddeven">';
print '<td>'.$langs->trans("Version").'</td>';
print '<td>1.0.0</td>';
print '</tr>';

print '<tr class="oddeven">';
print '<td>'.$langs->trans("Publisher").'</td>';
print '<td>Daxit Solutions</td>';
print '</tr>';

print '<tr class="oddeven">';
print '<td>'.$langs->trans("URL").'</td>';
print '<td><a href="https://daxit.be" target="_blank" rel="noopener noreferrer">https://daxit.be</a></td>';
print '</tr>';

print '<tr class="oddeven">';
print '<td>'.$langs->trans("License").'</td>';
print '<td>GPL v3+</td>';
print '</tr>';

print '</table>';

print dol_get_fiche_end();

llxFooter();
$db->close();
