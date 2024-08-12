<? if ($_SERVER['DOCUMENT_URI'] == "/404.php") {
 $_SERVER['REQUEST_URI'] = $_SERVER['DOCUMENT_URI'];
}
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
$url = "https://".substr($_SERVER['HTTP_HOST'],0,strpos($_SERVER['HTTP_HOST'],":")).$_SERVER['REQUEST_URI'];

CHTTP::SetStatus('404 Not Found');
@define('ERROR_404', 'Y');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Страница не найдена"); ?>
<style>
    div.error{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        font-size: 22px;
        line-height: 24px;
        font-family: sans-serif;
        margin: 50px auto;
        padding: 0 30px;
    }
    div.error>h1{
        margin: 0 auto 30px auto;
    }
    div.error>p:first-child{
        color: brown;
        font-size: 32px;
    }
    div.error>p{
        margin: 0 auto 30px auto;
    }
    .error>ul{
        display: flex;
        flex-direction: column;
    }
    .error>ul>h4{
        font-weight: 600;
        margin-bottom: 20px;
    }
    .error>ul>li{
        display: flex;
        align-items: center;
        justify-content: flex-start;
        list-style: unset;
    }
    .error a {
        display: contents;
        color: #3B7785;
        text-decoration: underline;
    }
</style>
<div class="error">
    <p>Ошибка 404</p>
    <h1>Страница не найдена</h1>
    <p>По запрошенному адресу <a><?=(isset($_SERVER['DOCUMENT_OLD_URI']))?$_SERVER['DOCUMENT_OLD_URI']:$url?></a> ничего нет</p>
<ul>
    <h4>Причины, которые могли привести к ошибке:</h4>
    <li>Неправильно набран адрес</li>
    <li>Такой страницы на этом сайте никогда не было</li>
</ul>
<p>Рекомендуем начать знакомство с нашим сайтом с&nbsp<a href="/"> главной страницы</a></p>
</div>
<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>