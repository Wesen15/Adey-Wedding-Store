<?php

class Flasher
{

    public static function setFlash($message, $action, $category)
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'action' => $action,
            'category' => $category
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-'. $_SESSION['flash']['category'].' alert-dismissible fade show" role="alert">'. $_SESSION['flash']['message'].'</strong>' . $_SESSION['flash']['action'] . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
          
        unset($_SESSION['flash']);
        }
    }

    public static function setFlash_modal($message, $title, $category)
    {
        $_SESSION['flash_modal'] = [
            'message' => $message,
            'title' => $title,
            'category' => $category
        ];
    }

    public static function flash_modal()
    {
        if (isset($_SESSION['flash_modal'])) {
            echo'<div data-notify="container" class="alert alert-dismissible alert-'. $_SESSION['flash_modal']['category'].' alert-notify animated fadeInDown" role="alert" data-notify-position="top-center" 
            style="display: inline-block; margin: 0px auto; position: fixed; transition: all 0.5s ease-in-out 0s; z-index: 1080; top: 15px; left: 0px; right: 0px; animation-iteration-count: 1;">
            
            <span class="alert-icon ni ni-bell-55" data-notify="icon"></span> 
            
            <div class="alert-text" <="" div=""> 
            <span class="alert-title" data-notify="title"> ' . $_SESSION['flash_modal']['title'] . '
            </span> <span data-notify="message">'. $_SESSION['flash_modal']['message'].'</span>
            </div>
            
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>';
          unset($_SESSION['flash_modal']);
          }
    }
}
