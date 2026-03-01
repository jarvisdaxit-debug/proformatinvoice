<?php
/**
 * ProFormaInvoice module library functions
 */

function proformatinvoiceAdminPrepareHead()
{
    global $langs, $conf;
    
    $langs->load("proformatinvoice@proformatinvoice");
    
    $h = 0;
    $head = array();
    
    $head[$h][0] = DOL_URL_ROOT.'/custom/proformatinvoice/admin/setup.php';
    $head[$h][1] = $langs->trans("Settings");
    $head[$h][2] = 'settings';
    $h++;
    
    $head[$h][0] = DOL_URL_ROOT.'/custom/proformatinvoice/admin/about.php';
    $head[$h][1] = $langs->trans("About");
    $head[$h][2] = 'about';
    $h++;
    
    return $head;
}
