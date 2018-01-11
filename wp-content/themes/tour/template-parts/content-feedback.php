<form method="post" name="feedback" class="shedule-form__form">
    <div class="shedule-form__group">
        <div class="shedule-form__item">
            <div class="shedule-form__input-title"><span>*</span>Name</div>
            <input name="uname" type="text" tabindex="1">
        </div>
        <div class="shedule-form__item">
            <div class="shedule-form__input-title"><span>*</span>Last name</div>
            <input name="lastname" type="text" tabindex="2">
        </div>
    </div>
    <div class="shedule-form__group">
        <div class="shedule-form__item">
            <div class="shedule-form__input-title"><span>*</span>E-mail adress</div>
            <input name="email" type="text" tabindex="3">
        </div>
        <div class="shedule-form__item">
            <div class="shedule-form__input-title"><span>*</span>Phone number</div>
            <input name="phone" type="text" tabindex="4">
        </div>
    </div>
    <div class="shedule-form__text-form">
        <div class="shedule-form__input-title"><span>*</span>Mesage</div>
        <textarea name="message" name="" id="" cols="30" rows="10" tabindex="5"></textarea>
    </div>
    <div class="shedule-form__clearfix"></div>
    <div class="shedule-form__button">
        <input type="submit" id="sub_form" class="btn btn--blue btn--middle btn--block" value="submit" tabindex="6">
        <input type="hidden" name="link" value="<?=get_theme_file_uri('/form/form.php')?>">
        <input type="hidden" name="success" value="<?=$data?>">
        <input type="hidden" name="emailto" value="<?=$emailto?>">
    </div>
    <div class="shedule-form__clearfix"></div>
</form>
