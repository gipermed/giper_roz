<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Пример работы виджета ПВЗ</title>
    <script type="text/javascript" src="https://widget.cdek.ru/widget/widjet.js" id="ISDEKscript" ></script>
</head>
<body>
<p>Виджет для оформления заказа</p>
<script type="text/javascript">
    var orderWidjet = new ISDEKWidjet({
        popup: true,
        defaultCity: 'Казань',
        cityFrom: 'Казань',
        goods: [ // установим данные о товарах из корзины
            { length : 10, width : 20, height : 20, weight : 5 }
        ],
        onReady : function(){ // на загрузку виджета отобразим информацию о доставке до ПВЗ
            ipjq('#linkForWidjet').css('display','inline');
        },
        onChoose : function(info){ // при выборе ПВЗ: запишем номер ПВЗ в текстовое поле и доп. информацию
            ipjq('[name="chosenPost"]').val(info.id);
            ipjq('[name="addresPost"]').val(info.PVZ.Address);
            // расчет стоимости доставки
            var price = (info.price < 500) ? 500 : Math.ceil( info.price/100 ) * 100;
            ipjq('[name="pricePost"]').val(price);
            ipjq('[name="timePost"]').val(info.term);
            orderWidjet.close(); // закроем виджет
        }
    });
</script>
<p> <a href='javascript:void(0)' onclick='orderWidjet.open()'>Выбрать ПВЗ</a> </p>
<div id="linkForWidjet" style="display: none;">
    <p>Выбран пункт выдачи заказов: <input type='text' name='chosenPost' value=''/></p>
    <p>Адрес пункта: <input type='text' name='addresPost' value=''/></p>
    <p>Стоимость доставки: <input type='text' name='pricePost' value=''/></p>
    <p>Примерные сроки доставки: <input type='text' name='timePost' value=''/></p>
</div>
</body>
</html>