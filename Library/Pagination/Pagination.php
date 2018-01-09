<?php

namespace Library\Pagination;

class Pagination
{
    public $buttons = array();

    public function __construct(Array $options = array('itemsCount' => 257, 'itemsPerPage' => 10, 'currentPage' => 1, 'prev' => 4))
    {
        extract($options);

        /** @var int $currentPage */
        if (!$currentPage) {
            return;
        }

        /** @var int $pagesCount
         *  @var int $itemsCount
         *  @var int $itemsPerPage
         *  @var int $per
         */
        $pagesCount = ceil($itemsCount / $itemsPerPage);

        if ($pagesCount == 1) {
            return;
        }

        /** @var int $currentPage */
        if ($currentPage > $pagesCount) {
            $currentPage = $pagesCount;
        }


        $this->buttons[] = new Button($currentPage - 1, $currentPage > 1, '<<');

//        if($currentPage > 0){
//            $this->buttons[] = new Button($currentPage + 1, $currentPage + 3);
//        }

            for ($i = 1; $i <= 26; $i++){

                $active = $currentPage != $i;
                $this->buttons[] = new Button($i, $active);
            }

        $this->buttons[] = new Button($currentPage + 1, $currentPage < $pagesCount, '>>');
    }
}