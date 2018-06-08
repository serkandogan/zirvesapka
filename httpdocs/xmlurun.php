<?php
// Veritabanı bilgileri Laravel .env dosyasından çekilmektedir.
$env = file_get_contents('../.env');
preg_match_all('/=(.*)/i',$env,$conf);
$dbname = trim($conf[1][7]);
$dbuser = trim($conf[1][8]);
$dbpass = trim($conf[1][9]);

try {
    $db = new PDO('mysql:host=localhost;dbname='.$dbname.';charset=utf8',$dbuser,$dbpass);
} catch(PDOException $e) {
    print $e->getMessage();
}

// Xml formatına dönüştürüyoruz
header('Content-Type: text/xml');

// Site ayarlarını çekiyoruz
$qAyarlar = $db->query("SELECT * FROM ayarlar",PDO::FETCH_ASSOC);
foreach($qAyarlar as $rA) {
    if($rA['name'] == 'title') {
        $title = $rA['value'];
    } else if($rA['name'] == 'description') {
        $description = $rA['value'];
    } else if($rA['name'] == 'url') {
        $url = $rA['value'];
    }
}

// Rss ana tanımlamaları yapıyoruz
echo '<?xml version="1.0"?>
    <rss xmlns:g="http://base.google.com/ns/1.0" version="2.0">
    <channel>
    <title>'.$title.'</title>
    <description>'.$description.'</description>
    <link>'.$url.'</link>';

// Site ayarlarını çekiyoruz
$qBlog = $db->query("SELECT * FROM urun where xmlurun=1 ORDER BY ID DESC",PDO::FETCH_ASSOC);
foreach($qBlog as $rB) {
    echo '
            <item>
                <g:id>'.$rB['ID'].'</g:id>
                <title><![CDATA['.$rB['Baslik'].']]></title>
                <g:description><![CDATA['.$rB['description'].']]></g:description>
                <link>https://zirvesapka.com/'.$rB['refurl'].'-u-'.$rB['ID'].'.html</link>
                <g:image_link>https://zirvesapka.com/upload/images/'.$rB['Resim'].'</g:image_link>
                <g:mobile_link></g:mobile_link>
                <g:availability>stokta</g:availability>
                <g:price>'.$rB['IndirimliFiyati'].' TRY</g:price>
                <g:google_product_category>241</g:google_product_category>
                <g:brand>Zirve Şapka</g:brand>
                <g:gtin></g:gtin>
                <g:identifier_exists>hayır</g:identifier_exists>
                <g:mpn>ZİRVE'.$rB['ID'].'ZİRVESAPKA</g:mpn>
                <g:condition>yeni</g:condition>
                <g:adult>hayır</g:adult>
                <g:multipack>2</g:multipack>
                <g:is_bundle>evet</g:is_bundle>
                <g:age_group>yetişkinler</g:age_group>
                <g:color></g:color>
                <g:gender>unisex</g:gender>
                <g:material></g:material>
                <g:pattern>Düz</g:pattern>
                <g:size></g:size>
                <g:item_group_id></g:item_group_id>
                <g:shipping>
                  <g:country>TR</g:country>
                  <g:region>MA</g:region>
                  <g:service>Kargo</g:service>
                  <g:price>'.$rB['IndirimliFiyati'].' TRY</g:price>
                </g:shipping>
            </item>
            ';
}

echo '</channel></rss>';