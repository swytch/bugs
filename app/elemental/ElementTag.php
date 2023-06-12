<?php
namespace Bugs\Elemental;

use SilverStripe\TagField\TagField;
use DNADesign\Elemental\Models\BaseElement;

class ElementTag extends BaseElement
{
    private static $db = [
        'BugTest' => 'Varchar(255)',
    ];

    private static $table_name = 'ElementTag';

    private static $singular_name = 'tag';

    public function getType()
    {
        return "Tag";
    }

    /**
     * @inheritDoc
     *
     * @return void
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab('Root.Main', [
            TagField::create(
                'BugTest',
                'BugTest',
                [],
            )
        ]);

        return $fields;
    }
}