<?php
namespace Bugs\Elemental;

use SilverStripe\Assets\Image;
use DNADesign\Elemental\Models\BaseElement;

class ElementImage extends BaseElement
{
    private static $has_one = [
        'Image' => Image::class
    ];

    private static $owns = [
      'Image',
    ];

    private static $table_name = 'ElementImage';

    private static $singular_name = 'image';

    public function getType()
    {
        return "Image";
    }

    /**
     * @inheritDoc
     *
     * @return void
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        return $fields;
    }
}