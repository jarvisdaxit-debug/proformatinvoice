<?php
/**
 * ProFormaInvoice: reference generator helper
 */
function proformatinvoice_get_next_proforma_ref()
{
     = defined('PROFORMA_REF_MASK') ? constant('PROFORMA_REF_MASK') : 'PROFORMA-{yyyy}-{00000}';
     = date('Y');
     = str_replace(array('{yyyy}','{YYYY}'), , );
     = defined('PROFORMA_REF_NEXT') ? (int) constant('PROFORMA_REF_NEXT') : 1;
     = str_replace('{00000}', str_pad(, 5, '0', STR_PAD_LEFT), );
    return ;
}
?>
