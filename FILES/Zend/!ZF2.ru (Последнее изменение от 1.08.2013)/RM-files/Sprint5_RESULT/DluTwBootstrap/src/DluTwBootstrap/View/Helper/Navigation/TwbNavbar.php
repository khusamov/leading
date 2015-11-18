<?php
namespace DluTwBootstrap\View\Helper\Navigation;
use DluTwBootstrap\View\Helper\Navigation\Exception\UnsupportedElementTypeException;

/**
 * TwbNavbar
 * @package DluTwBootstrap
 * @copyright David Lukas (c) - http://www.zfdaily.com
 * @license http://www.zfdaily.com/code/license New BSD License
 * @link http://www.zfdaily.com
 * @link https://bitbucket.org/dlu/dlutwbootstrap
 */
class TwbNavbar extends AbstractNavHelper
{

    /* *********************** METHODS *************************** */

    /**
     * Renders helper
     * @param  string|\Zend\Navigation\AbstractContainer $container [optional] container to render.
     *                                         Default is null, which indicates
     *                                         that the helper should render
     *                                         the container returned by {@link
     *                                         getContainer()}.
     * @return string helper output
     * @throws \Zend\View\Exception\ExceptionInterface if unable to render
     */
    public function render($container = null) {
        return $this->renderNavbar($container);
    }

    public function renderNavbar(\Zend\Navigation\Navigation $container = null,
                                    $leftElements = null,
                                    $rightElements = null,
                                    \Zend\Navigation\Page\AbstractPage $brandLink = null,
                                    $brandName = null,
                                    $fixed = true,
                                    $fixedBottom = false,
                                    $responsive = true,
                                    $renderIcons = true,
                                    $inverse = false) {
        if (null === $container) {
            $container = $this->getContainer();
        }
        if($leftElements && !is_array($leftElements)) {
            $leftElements   = array($leftElements);
        }
        if($rightElements && !is_array($rightElements)) {
            $rightElements  = array($rightElements);
        }
        $html   = '';

        //Navbar scaffolding
        $navbarClass    = 'navbar';
        if($fixed) {
            if($fixedBottom) {
                $navbarClass    .= ' navbar-fixed-bottom';
            } else {
                $navbarClass    .= ' navbar-fixed-top';
            }
        }
        if ($inverse) {
            $navbarClass        .= ' navbar-inverse';
        }
        $html   .= '<div class="' . $navbarClass . '">';
        $html   .= "\n" . '<div class="navbar-inner">';
        $html   .= "\n" . '<div class="container">';

        //Responsive (button)
        if($responsive) {
            $html   .= "\n" . '<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">';
            $html   .= "\n" . '<span class="icon-bar"></span>';
            $html   .= "\n" . '<span class="icon-bar"></span>';
            $html   .= "\n" . '<span class="icon-bar"></span>';
            $html   .= "\n" . '</a>';
        }

        //Brand
        if($brandLink) {
            $view   = $this->getView();
            if($brandName) {
                $brandName  = $view->escapeHtml($brandName);
            } else {
                $brandName  = $view->escapeHtml($brandLink->getLabel());
            }
            $html   .= "\n" . '<a class="brand" href="' . $brandLink->getHref() . '">' . $brandName . '</a>';
        }

        //Responsive (div)
        if($responsive) {
            $html   .= "\n" . '<div class="nav-collapse">';
        }

        //Primary container
        $options    = array(
            'align'     => null,
            'ulClass'   => 'nav',
        );
        $html   .= "\n" . $this->renderContainer($container, $renderIcons, true, $options);

        //Left elements
        if($leftElements) {
            $html   .= "\n" . $this->renderElements($leftElements, 'left', $renderIcons);
        }

        //Right elements
        if($rightElements) {
            $html   .= "\n" . $this->renderElements($rightElements, 'right', $renderIcons);
        }

        //Responsive (close div)
        if($responsive) {
            $html   .= "\n" . '</div>';
        }

        //Scaffolding (close divs)
        $html   .= "\n</div>";
        $html   .= "\n</div>";
        $html   .= "\n</div>";

        return $html;
    }

    protected function renderElements(array $elements, $align = null, $renderIcons = true) {
        $html   = '';
        $view   = $this->getView();
        foreach($elements as $element) {
            if($element instanceof \Zend\Navigation\AbstractContainer) {
                $options    = array(
                    'align'     => $align,
                    'ulClass'   => 'nav',
                );
                $html   .= "\n" . $this->renderContainer($element, $renderIcons, true, $options);
            }
            //TODO - implement support for search and inline forms
            /*
            elseif ($element instanceof \DluTwBootstrap\Form\Search) {
                $class  = $element->getAttrib('class');
                $this->addWord('navbar-search', $class);
                if($align == self::ALIGN_LEFT) {
                    $this->addWord('pull-left', $class);
                } elseif($align == self::ALIGN_RIGHT) {
                    $this->addWord('pull-right', $class);
                }
                $element->setAttrib('class', $class);
                $html   .= "\n" . $element->render();
            } elseif ($element instanceof \DluTwBootstrap\Form\Inline) {
                $class  = $element->getAttrib('class');
                $this->addWord('navbar-form', $class);
                if($align == self::ALIGN_LEFT) {
                    $this->addWord('pull-left', $class);
                } elseif($align == self::ALIGN_RIGHT) {
                    $this->addWord('pull-right', $class);
                }
                $element->setAttrib('class', $class);
                $html   .= "\n" . $element->render();
            }
            */
            elseif (is_string($element)) {
                $pClass    = 'navbar-text';
                if($align == self::ALIGN_LEFT) {
                    $pClass    .= ' pull-left';
                } elseif($align == self::ALIGN_RIGHT) {
                    $pClass    .= ' pull-right';
                }
                $html   .= "\n" . '<p class="' . $pClass . '">' . $view->escapeHtml($element) . '</p>';
            } else {
                throw new UnsupportedElementTypeException('Unsupported element type.');
            }
        }
        return $html;
    }
}