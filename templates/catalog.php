<h1>Каталог</h1>

<? foreach ($catalog as $item): ?>
    <a href="/product/card/?id=<?=$item['id']?>">
    <h3><?=$item['name']?></h3>
    <img width="150px" src="/img/<?=$item['image']?>" alt="">
<p><?=$item['short_desc']?></p>
<p><?=$item['price']?></p>
    </a>
<? endforeach;?>
