<?php
/**
* HomePage Slide
*
* @package plato-silverstripe-homeslides
*/
class HomeSlide extends DataObject {

    private static $default_sort = "Sort";

    private static $db = array(
        "Title" => "Varchar(255)",
        "Content" => "Text",
        "Status" => "Boolean",
        "Sort" => "Int"
    );

    private static $has_one = array(
        "HomePage" => "HomePage",
        "Link" => "Link",
        "Image" => "Image"
    );

    private static $summary_fields = array(
        "Title" => "Title",
        "CurrentStatus" => "Status",
        "Image.CMSThumbnail" => "Image"
    );

    /**
    * @param Member $member
    *
    * @return boolean
    */
    // public function canEdit($member = null) {
    //     return ($this->canEdit($member));
    // }

    /**
    * @param Member $member
    *
    * @return boolean
    */
    // public function canDelete($member = null) {
    //     return ($this->canDelete($member));
    // }

    public function getCMSFields() {
        $fields = new FieldList(
            OptionsetField::create(
                'Status',
                'Status',
                array(
                    "1" => "Active",
                    "0" => "Not Active"
                ),
                1
            ),
            TextField::create(
                'Title',
                'Title'
            )->setDescription("Title of the slide"),
            TextareaField::create(
                'Content',
                'Content'
            )->setDescription("Content of the slide"),
            LinkField::create(
				'LinkID',
				'Link'
			),
            UploadField::create(
                'Image',
                'Image'
            )->setFolderName("HomeSlides")
        );
        return $fields;
    }

    public function getCurrentStatus() {
        return ($this->Status == 1 ? "Active" : "Not Active");
    }

}
