<?php
namespace ZfDeals\View\Helper;

use Zend\View\Helper\AbstractHelper;

class RenderForm extends AbstractHelper
{
    public function __invoke($form)
    {
        $form->prepare();
        $html = $this->view->form()->openTag($form) . PHP_EOL;
        $html .= $this->renderFieldsets($form->getFieldsets());
        $html .= $this->renderElements($form->getElements());
        $html .= $this->view->form()->closeTag($form) . PHP_EOL;
        return $html;
    }

    private function renderFieldsets($fieldsets)
    {
        $html = '';

        foreach($fieldsets as $fieldset)
        {
            if(count($fieldset->getFieldsets()) > 0) {
                $html .= $this->renderFieldsets($fieldset->getFieldsets());
            }

            $html .= $this->renderElements($fieldset->getElements());
        }

        return $html;
    }

    private function renderElements($elements)
    {
        $html = '';

        foreach($elements as $element) {
            $html .= $this->renderElement($element);
        }

        return $html;
    }

    private function renderElement($element)
    {
        if($element->getAttribute('type') == 'submit') {
            return $this->view->formSubmitTwb($element) . PHP_EOL;
        }
        else {
            return $this->view->formRow($element) . PHP_EOL;
        }
    }
}
