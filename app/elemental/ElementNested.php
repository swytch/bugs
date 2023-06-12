<?php
namespace Bugs\Elemental;

use SilverStripe\ORM\CMSPreviewable;
use DNADesign\Elemental\Models\BaseElement;
use DNADesign\Elemental\Models\ElementalArea;
use DNADesign\Elemental\Extensions\ElementalAreasExtension;

class ElementNested extends BaseElement implements CMSPreviewable
{

    private static $table_name = 'ElementNested';

    private static $has_one = [
        'Elements' => ElementalArea::class
    ];

    private static $owns = [
        'Elements'
    ];

    private static $cascade_deletes = [
        'Elements'
    ];

    private static $cascade_duplicates = [
        'Elements'
    ];

    private static $extensions = [
        ElementalAreasExtension::class
    ];

    private static $singular_name = 'nested';

    public function getType()
    {
        return "Nested";
    }

    /**
     * Retrieve a elemental area relation name which this element owns
     *
     * @return string
     */
    public function getOwnedAreaRelationName(): string
    {
        $has_one = $this->config()->get('has_one');

        foreach ($has_one as $relationName => $relationClass) {
            if ($relationClass === ElementalArea::class && $relationName !== 'Parent') {
                return $relationName;
            }
        }

        return 'Elements';
    }

    /**
     * @inheritDoc
     */
    public function inlineEditable()
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function updateAvailableTypesForClass($class, &$list)
    {
        $list = [
            ElementImage::class => 'Image',
            ElementTag::class => 'Tag',
        ];
    }
}