<?php
class Model_Pagination extends Model
{
    public function getPaginationList($totalItems, $perPage, $router)
    {
        $strNavQueryString = $router->getQueryString('page');
        $pages = ceil($totalItems / $perPage);
        $paginationList =  "<nav aria-label='Page navigation'>";
        $paginationList .= "<ul class='pagination'>";
        $paginationList .= "<li><a href='".$strNavQueryString."page=1' aria-label='Previous'><span aria-hidden='true'>«</span> Начало</a></li>";
        for($i = 2; $i <= $pages - 1; $i++) {
            $paginationList .= "<li><a href='".$strNavQueryString."page=".$i."'>" . $i ."</a></li>";
        }
        $paginationList .= "<li><a href='".$strNavQueryString."page=".$pages."' aria-label='Next'>Конец <span aria-hidden='true'>»</span></a></li>";
        return $paginationList;
    }
}