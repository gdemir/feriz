<?php

class PageHelper {

  public static function dropdown_menu($pages, $content = "") {
    if (!is_null($pages)) {
      $content = "<ul class='dropdown-menu'>";
      foreach ($pages as $page) {
        $pages = $page->all_of_page;
        if (!is_null($pages)) {
          $content .= "<li class='dropdown-submenu'>";
          $content .= "<a tabindex='-1' href='/home/pages/" . $page->id . "'>" . $page->title() . "</a>";
          $content .= PageHelper::dropdown_menu($page->all_of_page, $content);
          $content .= "</li>";
        } else
        $content .= "<li><a href='/home/pages/". $page->id . "'>". $page->title() . "</a></li>";
      }
      $content .= "</ul>";
    }
    return $content;
  }

  public static function parent_breadcrumbs($page, $content = "") {
    $parent_page = $page->page;
    if (!is_null($parent_page)) {
      $content = "<li><a href='/home/pages/" . $parent_page->id . "'>" . $parent_page->title() . "</a></li>" . $content;
      return PageHelper::parent_breadcrumbs($parent_page, $content);
    } else {
      return $content;
    }
  }

  public static function sub_links($pages, $now_page, $content = "", $indent = "") {
    if (!is_null($pages)) {
      foreach ($pages as $page) {
        $content .= "<a href='/home/pages/" . $page->id . "' class='list-group-item " . (($now_page->id == $page->id) ? "active" : "") . "'>" . $indent . $page->title() . "</a>";
        $content = PageHelper::sub_links($page->all_of_page, $now_page, $content, $indent . "→");
      }
    }
    return $content;
  }

  public static function table_rows($pages, $content = "", $indent = "") {
    if (!is_null($pages)) {
      foreach ($pages as $page) {
        $content .= "
        <tr>
        <td>" . $page->id . "</td>
        <td>" . $indent . $page->title() . "</td>
        <td>" . $page->created_at . "</td>
        <td>" . $page->updated_at . "</td>

        <td>
        <form action='/admin/pages/destroy' method='post'>
        <a href='/admin/pages/show/" . $page->id . "'
        class='btn btn-default' role='button' title='Göster'><i class='fa fa-search'></i>
        </a>

        <a href='/admin/pages/edit/" . $page->id . "'
        class='btn btn-default' role='button' title='Düzenle'><i class='fa fa-edit'></i>
        </a>

        <input type='hidden' value='" . $page->id . "' id='id' name='id'/>
        <button type='submit' class='btn btn-default' onClick='return confirm(\'Bu kaydı silmek istediğinizden emin misiniz?\');' title='Sil'>
        <i class='fa fa-trash'></i>
        </button>
        </form>
        </td>
        </tr>
        ";
        $content = PageHelper::table_rows($page->all_of_page, $content, $indent . "→");
      }
    }
    return $content;
  }

  public static function select_option($pages, $content = "", $indent = "") {
    if (!is_null($pages)) {
      foreach ($pages as $page) {
        $content .= "<option value='" . $page->id . "'>" . $indent . $page->title() . "</option>";
        $content = PageHelper::select_option($page->all_of_page, $content, $indent . "→");
      }
    }
    return $content;
  }

  public static function select_option_selected($pages, $now_page, $parent_page, $content = "", $indent = "") {
    if (!is_null($pages)) {
      foreach ($pages as $page) {
        if ($page->id != $now_page->id) {
          if ($parent_page)
            $content .= "<option value='" . $page->id . "'" . (($page->id == $parent_page->id) ? "selected" : "") . "> " . $indent . $page->title() . "</option>";
          else
            $content .= "<option value='" . $page->id . "'>" . $indent . $page->title() . "</option>";
          $content = PageHelper::select_option_selected($page->all_of_page, $now_page, $parent_page, $content, $indent . "→");
        }
      }
    }
    return $content;
  }

}

?>