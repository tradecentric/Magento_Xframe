<?php

namespace Punchout2Go\Xframe\Block\Adminhtml\Form\Field;

class Keyvalue extends \Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray
{
    /**
     * @var Customergroup
     */
    protected $_groupRenderer;

    /**
     * Retrieve group column renderer
     *
     * @return Customergroup
    protected function _getGroupRenderer()
    {
        if (!$this->_groupRenderer) {
            $this->_groupRenderer = $this->getLayout()->createBlock(
                'Magento\CatalogInventory\Block\Adminhtml\Form\Field\Customergroup',
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
            $this->_groupRenderer->setClass('customer_group_select');
        }
        return $this->_groupRenderer;
    }
     */

    /**
     * Prepare to render
     *
     * @return void
     */
    protected function _prepareToRender()
    {
        /*$this->addColumn(
            'customer_group_id',
            ['label' => __('Customer Group'), 'renderer' => $this->_getGroupRenderer()]
        );*/
        $this->addColumn('user_value', ['label' => __('User Value')]);
        $this->addColumn('header', ['label' => __('Header')]);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Group');
    }

    /**
     * Prepare existing row data object
     *
     * @param \Magento\Framework\DataObject $row
     * @return void
     */
    protected function _prepareArrayRow(\Magento\Framework\DataObject $row)
    {
        $optionExtraAttr = [];
        /*$optionExtraAttr['option_' . $this->_getGroupRenderer()->calcOptionHash($row->getData('customer_group_id'))] =
            'selected="selected"';*/
        $row->setData(
            'option_extra_attrs',
            $optionExtraAttr
        );
    }
}
