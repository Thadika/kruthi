<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');
class common extends CI_Model
{
	
function pagination_data($total,$page)
    {
    $data    =array();
    $limit   = 14;
	$pages   = ceil($total / $limit);
    $offset  = ($page - 1)  * $limit;
    $start   = $offset + 1;
    $end     = min(($offset + $limit), $total);
    if($page<$pages)
    $next_page=$page+1;
    else
    $next_page=$page;
    
    if($page!=1)
    $previous_page=$page-1;
    else
    $previous_page=$page;
    
    $page_numbers=array(5,10,15,20,25,30,35,40,45,50);
    //$start_page=1;
    foreach($page_numbers as $pn)
    {
     if($page <= $pn)
     {
        $start_page=$pn-4;
        break; 
     }
    }

    $data['row_count']      =$total;    
    $data['pages']          =$pages;
    $data['limit']          =$limit;
    $data['offset']         =$offset;
    $data['start']          =$start;
    $data['end']            =$end;
    $data['page']           =$page;
    $data['next_page']      =$next_page;
    $data['previous_page']  =$previous_page;
    $data['start_page']     =$start_page;
    return $data;
    }	
	
	
}