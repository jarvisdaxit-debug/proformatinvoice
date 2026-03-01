<?php
/**
 * Hooks for ProFormaInvoice module
 */

class InterfaceProFormatInvoiceHooks
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * FormObjectOptions hook
     * Inject a Proforma toggle into invoice forms
     *
     * @param array $parameters      Parameters
     * @param mixed $object          Object triggering the action
     * @param string $action         Action code
     * @param mixed $hookmanager     Hook manager
     * @return array|int             Hook result
     */
    public function formObjectOptions($parameters, $object, $action, $hookmanager)
    {
        global $langs;
        // Load language file for proformatinvoice module
        $langs->load("proformatinvoice@proformatinvoice");

        // Check if the object is an invoice or a proposal
        if (isset($object->element) && in_array($object->element, array('invoice', 'facture'))) {
            $checked = '';
            // Check if 'options_is_proforma' is set and true
            if (isset($object->array_options['options_is_proforma']) && $object->array_options['options_is_proforma']) {
                $checked = ' checked';
            }

            // Generate the HTML for the proforma checkbox
            $html = '<tr class="oddeven">';
            $html .= '<td>'.$langs->trans("ProFormaInvoice").'</td>';
            $html .= '<td><label><input type="checkbox" name="options_is_proforma" value="1"'.$checked.'> '.$langs->trans("IsProforma").'</label></td>';
            $html .= '</tr>';
            
            // Return HTML to be injected into the form
            return array('html' => $html);
        }
        return 0; // Return 0 if not applicable
    }
}
