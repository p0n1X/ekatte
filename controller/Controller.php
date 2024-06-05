<?php
namespace APP\Controller\Controller;

include('./model/Data.php');

use APP\Model\Data\Data;

const PER_PAGE = 10;

class DataController
{
    /**
     * Preparing and calculating data for all page
     *
     * @param $page
     * @param $rowcount
     * @param $page_data
     * @return array
     */
    private function prepare_data($page, $rowcount, $page_data): array
    {
        $pages = ceil($rowcount / PER_PAGE);

        $current_page = 1;
        if ($page <= 3) {
            $current_page = 3;
        } elseif ($page >= $pages) {
            $current_page = $pages - 1;
        } else {
            $current_page = $page;
        }

        $prev = $page - 1;
        $next = $page + 1;

        return [$page_data, $current_page, $prev, $next, $pages];

    }

    /**
     * Getting all data from our database
     *
     * @param $page
     * @return array
     */
    public function get_data($page): array
    {
        $data_model = new Data;

        $get_all_row_data = $data_model->get_all_raw();
        $page_data = $data_model->get_limit_page(PER_PAGE, $page);
        $data_model->close();

        return $this->prepare_data($page, $get_all_row_data->num_rows, $page_data);
    }

    /**
     * Preparing data from search field
     *
     * @param $filter
     * @param $page
     * @return array
     */
    public function get_filtered_data($filter, $page): array
    {
        $data_model = new Data;
        [$rowcount, $page_data] = $data_model->get_filtered_data($filter, $page, PER_PAGE,);
        $data_model->close();

        return $this->prepare_data($page, $rowcount, $page_data);
    }
}