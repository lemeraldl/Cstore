<?php
class adminBoard extends Controller_Admin
{


    protected function run($aArgs)
    {

     
         //board_create example 
        /* $aBoardList = $this->Openapi->call
                      (
                'board'
                ,'write'
                ,array(
                        'board_no'=>5,
                        'subject' =>'7777777777',
                        'content' =>'zz',
                        'writer'  =>'111222',
                        'email1'=>'aweg@aweg.aweg',
                        'email2'=>'aweg@aweg.aweg',
                        'passwd'=>'1111'
        )
                ,'POST'); */
        
        // board_read  example 
       /*  $aBoardList = $this->Openapi->call
                (
                'board'
                ,'read'
                ,array(
                        'board_no'=>5,
                        'no'=>18
                )); */
        
        // board_delete example 
   /*      $aBoardList = $this->Openapi->call
               (
                'board'
                ,'delete'
                ,array(
                        'board_no'=>5,
                        'no'=>15,
                        'passwd'=>1111
                         
                )
                ,'POST'); */
       
    
        // board_update example 
       /*  $aBoardList = $this->Openapi->call
                      (
                'board'
                ,'update'
                ,array(
                        'board_no'=>5,
                        'no'=>14,
                        'passwd'=>1111 ,
                         'subject'=>'bvnbn'
                )
                ,'POST'); */
        
          //board_list example 
        /*   $aBoardList = $this->Openapi->call
                (
                'board'
                ,'list'
                ,array(
                        'board_no'=>5,
                        'search_date'=>"month12"
                ));
        */
        
        //board_detail example 
        $aBoardList = $this->Openapi->call
                 (
                'board'
                ,'detail'
                ,array(
                        'board_no'=>5,
                       
                ));
        
        
        
        var_dump($aBoardList);exit;
    }

}
