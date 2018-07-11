<?php

/* @var $this yii\web\View */

$this->title = 'White Rooster';
?>
<div class="site-index">
    </p>
    <p>Пароль для входа в административную часть: <b>admin</b></p>
    <p>
        <b>"/news"</b> - все новости.
    </p>

    <p>
        <b>"/news?id="</b> - поиск по id.
    </p>

    <p>
        <b>"/news?id=&header="</b> - поиск по нескольким полям (например: id, header).
    </p>

    <p>
        <b>"/gallery"</b> - вся галерея.
    </p>

    <p>
        <b>"/gallery?guid="</b> - поиск по guid.
    </p>

    <p>
        <b>"/news?description=&name="</b> - поиск по нескольким полям (например: description, name).
    </p>
    <p>Ответ в формате JSON</p>
</div>
