<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
?>

<?
  $pagetitle = 'dfgdfgdfgdfg';//$APPLICATION->ShowTitle(false);
?>

	<div class="">
		<div class="row">
            <?$APPLICATION->IncludeComponent(
                "bitrix:news.detail",
                "bootstrap_v4",
                array(
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "ADD_ELEMENT_CHAIN" => "N",
                    "ADD_SECTIONS_CHAIN" => "Y",
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "BROWSER_TITLE" => "-",
                    "CACHE_GROUPS" => "Y",
                    "CACHE_TIME" => "36000000",
                    "CACHE_TYPE" => "A",
                    "CHECK_DATES" => "N",
                    "DETAIL_URL" => "/news/detail.php?=#ELEMENT_ID#",
                    "DISPLAY_BOTTOM_PAGER" => "Y",
                    "DISPLAY_DATE" => "Y",
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => "Y",
                    "DISPLAY_PREVIEW_TEXT" => "Y",
                    "DISPLAY_TOP_PAGER" => "N",
                    "ELEMENT_CODE" => $_REQUEST["CODE"],
                    "ELEMENT_ID" => $_REQUEST["ID"],
                    "FIELD_CODE" => array(
                        0 => "ID",
                    ),
                    "IBLOCK_ID" => "4",
                    "IBLOCK_TYPE" => "news",
                    "IBLOCK_URL" => "",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                    "MEDIA_PROPERTY" => "",
                    "MESSAGE_404" => "",
                    "META_DESCRIPTION" => "-",
                    "META_KEYWORDS" => "-",
                    "PAGER_BASE_LINK_ENABLE" => "N",
                    "PAGER_SHOW_ALL" => "N",
                    "PAGER_TEMPLATE" => ".default",
                    "PAGER_TITLE" => "Страница",
                    "PROPERTY_CODE" => array(
                        0 => "GROUPS_OF_USERS",
                        1 => "",
                    ),
                    "SET_BROWSER_TITLE" => "Y",
                    "SET_CANONICAL_URL" => "N",
                    "SET_LAST_MODIFIED" => "N",
                    "SET_META_DESCRIPTION" => "Y",
                    "SET_META_KEYWORDS" => "Y",
                    "SET_STATUS_404" => "N",
                    "SET_TITLE" => "Y",
                    "SHOW_404" => "N",
                    "SLIDER_PROPERTY" => "",
                    "STRICT_SECTION_CHECK" => "N",
                    "TEMPLATE_THEME" => "blue",
                    "USE_PERMISSIONS" => "N",
                    "USE_SHARE" => "N",
                    "COMPONENT_TEMPLATE" => "bootstrap_v4"
                ),
                false
            );?>
		</div>
		<div class="row">
            <?$APPLICATION->IncludeComponent(
                "custom_components:main.feedback",
                "bootstrap_v4",
                array(
                    "USE_CAPTCHA" => "Y",
                    "OK_TEXT" => "Спасибо, ваше сообщение принято.",
                    "EMAIL_TO" => "ayupovazamat@gmail.com",
                    "AJAX_MODE" => "Y",
                    "REQUIRED_FIELDS" => array(
                        0 => "NAME",
                        1 => "EMAIL",
                        2 => "MESSAGE",
                    ),
                    "EVENT_MESSAGE_ID" => array("83"),
                    "COMPONENT_TEMPLATE" => "bootstrap_v4",
                    "SET_TITLE" => "N",
                    "PAGETITLE" => $pagetitle, //$APPLICATION->ShowTitle(false)
                ),
                false
            );?>
		</div>
	</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>