<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

\Bitrix\Main\UI\Extension::load("ui.bootstrap4");
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */


?>

<?
// получим массив групп текущего пользователя
global $USER;
$arGroups = $USER->GetUserGroupArray();
/*echo "<pre>"; print_r($arGroups); echo "</pre>";*/
?>

<div class="mb-4">
	<?if(!empty($arResult["ERROR_MESSAGE"]))
	{
		foreach($arResult["ERROR_MESSAGE"] as $v)
			ShowError($v);
	}
	if(strlen($arResult["OK_MESSAGE"]) > 0)
	{
		?><div class="alert alert-success"><?=$arResult["OK_MESSAGE"];print_r($arResult)?></div><?
	}
	?>

	<form action="<?=POST_FORM_ACTION_URI?>" method="POST">
		<?=bitrix_sessid_post()?>

        <div class="form-group">
            <input
                    type="text"
                    id="mainFeedback_pagetitle"
                    name="pagetitle"
                    class="form-control"
                    value="<?=$arResult["PAGETITLE"] = $APPLICATION->ShowTitle(false);?>"
                    disabled
                    <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("PAGETITLE", $arParams["REQUIRED_FIELDS"])): ?>required<?endif?>
            />
        </div>

		<div class="form-group">
			<label for="mainFeedback_name"><?=GetMessage("MFT_NAME");?><?
				if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?><span class="mf-control-required">*</span><?endif;?></label>
			<input
				type="text"
				id="mainFeedback_name"
				name="user_name"
				class="form-control"
				value="<?=$arResult["AUTHOR_NAME"]?>"
				<?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])): ?>required<?endif?>
			/>
		</div>

        <!-- custom -->
        <div class="form-group">
            <label for="mainFeedback_last_name"><?=GetMessage("MFT_LAST_NAME");?><?
                if(empty($arParams["REQUIRED_FIELDS"]) || in_array("LAST_NAME", $arParams["REQUIRED_FIELDS"])):?><span class="mf-control-required">*</span><?endif;?></label>
            <input
                type="text"
                id="mainFeedback_last_name"
                name="user_last_name"
                class="form-control"
                value="<?=$arResult["AUTHOR_LAST_NAME"]?>"
                <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("LAST_NAME", $arParams["REQUIRED_FIELDS"])): ?>required<?endif?>
            />
        </div>

        <!--<div class="form-group">
            <label for="mainFeedback_second_name"><?/*=GetMessage("MFT_SECOND_NAME");*/?><?/*
                if(empty($arParams["REQUIRED_FIELDS"]) || in_array("SECOND_NAME", $arParams["REQUIRED_FIELDS"])):*/?><span class="mf-control-required">*</span><?/*endif;*/?></label>
            <input
                type="text"
                id="mainFeedback_second_name"
                name="user_second_name"
                class="form-control"
                value="<?/*=$arResult["AUTHOR_SECOND_NAME"]*/?>"
                <?/*if(empty($arParams["REQUIRED_FIELDS"]) || in_array("SECOND_NAME", $arParams["REQUIRED_FIELDS"])): */?>required<?/*endif*/?>
            />
        </div>-->

        <div class="form-group">
            <label for="mainFeedback_last_name"><?=GetMessage("MFT_PERSONAL_PHONE");?><?
                if(empty($arParams["REQUIRED_FIELDS"]) || in_array("PERSONAL_PHONE", $arParams["REQUIRED_FIELDS"])):?><span class="mf-control-required">*</span><?endif;?></label>
            <input
                    type="text"
                    id="mainFeedback_personal_phone"
                    name="user_personal_phone"
                    class="form-control"
                    value="<?=$arResult["PERSONAL_PHONE"]?>"
                    <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("PERSONAL_PHONE", $arParams["REQUIRED_FIELDS"])): ?>required<?endif?>
            />
        </div>

        <!-- and custom -->
		<div class="form-group">
			<label for="mainFeedback_email"><?=GetMessage("MFT_EMAIL")?><?
				if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?><span class="mf-control-required">*</span><?endif?></label>
			<input
				type="text"
				name="user_email"
				id="mainFeedback_email"
				class="form-control"
				value="<?=$arResult["AUTHOR_EMAIL"]?>"
				<?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?>required<?endif?>
			/>
		</div>

		<div class="form-group">
			<label for="mainFeedback_message"><?=GetMessage("MFT_MESSAGE")?><?
				if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?><span class="mf-control-required">*</span><?endif?></label>
			<textarea class="form-control" id="mainFeedback_message" name="MESSAGE" rows="5"><?=$arResult["MESSAGE"]?></textarea>
		</div>

		<?if($arParams["USE_CAPTCHA"] == "Y"):?>
		<div class="form-row">
			<div class="form-group col-auto">
				<label><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-control-required">*</span></label><br/>
				<input type="text" if="mainFeedback_captcha" class="form-control" name="captcha_word" size="30" maxlength="50" value=""/><br/>
			</div>
			<div class="form-group col">
				<label for="mainFeedback_captcha"><?=GetMessage("MFT_CAPTCHA")?></label> <div style="clear:both"></div>
				<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
				<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="38" alt="CAPTCHA">
			</div>
		</div>
		<?endif;?>

		<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
		<input type="submit" name="submit"  value="<?=GetMessage("MFT_SUBMIT")?>" class="btn btn-primary">
	</form>
</div>