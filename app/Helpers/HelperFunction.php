<?php


function clink()
{
    $param = func_get_args();
    /**
     * ADMIN
     */
    if ($param[0] == 'categorySave')
    {
        $return = url('admin/category/savecategory');
    } else if ($param[0] == 'variationEdit')
    {
        $return = url("admin/variations/edit");
    } else if ($param[0] == 'productUpdate')
    {
        $return = url("admin/products/update");
    } else if ($param[0] == 'variationDelete')
    {
        $return = url("admin/variations/delete/{$param[1]}/{$param[2]}");
    } else if ($param[0] == 'sliderOder')
    {
        $return = url('/admin/slider/orderup');
    } else if ($param[0] == 'TumUrunGonder')
    {
        $return = url('/admin/products/tumurungonder');
    } else if ($param[0] == 'userRole')
    {
        $return = url('/admin/users/role');
    } /**
     * SITE -----
     */
    else if ($param[0] == 'product')
    {
        $return = url($param[1] . '-u-' . $param[2] . '.html');
    } else if ($param[0] == 'page')
    {
        $return = url($param[1] . '-' . $param[2]);
    } else if ($param[0] == 'category')
    {
        $return = url($param[1] . '-k-' . $param[2] . '.html');
    } else if ($param[0] == 'memberLogin')
    {
        $return = url('/uye/giris/' . $param[1]);
    } else if ($param[0] == 'cartAdd')
    {
        $return = url('/sepet/ekle/' . $param[1]);
    } else if ($param[0] == 'cartRemove')
    {
        $return = url('/sepet/sil/' . $param[1]);
    } else if ($param[0] == 'cartDestroy')
    {
        $return = url('/sepet/bosalt');
    } else if ($param[0] == 'cartBuy')
    {
        $return = url('/sepet/satinal');
    } else if ($param[0] == 'AdressDelete')
    {
        $return = url('/hesap/adressil/' . $param[1]);
    } else if ($param[0] == 'search')
    {
        $return = url('/arama');
    } /**
     * UYE -----
     */
    else if ($param[0] == 'login')
    {
        $return = url('/uye/login');
    } else if ($param[0] == 'logout')
    {
        $return = url('/uye/logout');
    } else if ($param[0] == 'register')
    {
        $return = url('/uye/register');
    } else if ($param[0] == 'profile')
    {
        $return = url('/hesap/profile');
    } else if ($param[0] == 'address')
    {
        $return = url('/hesap/address');
    } else if ($param[0] == 'order')
    {
        $return = url('/hesap/order');
    } else
    {
        $return = url('/');
    }
    if (end($param) == 'return')
    {
        return $return;
    } else
    {
        echo $return;
    }
}

function getPerm($key, $field, $user_id, $result = 'hidden')
{
    return App\Models\UserRole::check($key, $field, $user_id, $result);
}

function searchCovert($var, $pars = ' ')
{
    $explode = explode($pars, $var);
    if (!empty($explode))
    {
        return convertArray($explode);
    }
    return FALSE;
}

function convertArray($result)
{
    $toArray = array();
    if (!empty($result))
    {
        foreach ($result as $key => $value)
        {
            $toArray[] = $value;
        }
        return $toArray;
    }
    return FALSE;
}

function galleryImg($name, $path = null)
{
    $path <> NULL ? $path : 'image';
    return url("upload/{$path}/{$name}");
}

function image($name = null, $defaultPath = null)
{
    return image_path($name, $defaultPath);
}

function image_path($name = null, $defaultPath = 'product')
{

    if ($defaultPath == 'slider')
    {
        $path = $defaultPath;
    } else
    {
        $path = "images";
    }

    if ($name != NULL)
    {
        return "upload/{$path}/{$name}";
    } else
    {
        return "upload/{$path}/";
    }
}


/*
 * TEMA FONKSİYONLARIMIZ
 */
function themeName()
{
    return 'default';
}

function theme($name)
{
    $path = 'template.' . themeName() . '.' . $name;
    if (view()->exists($path))
    {
        return $path;
    } else
    {
        return 'erros.theme-notfound';
    }
}

function themeUrl($name)
{
    return 'template/' . themeName() . '/' . $name;
}

function ayar ($name) {
    if (!empty($name))  {
        return \App\Models\Ayarlar::get($name);
    }
    return FALSE;
}
function limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}
/*
 * SEPET FONKSİOYNLARIMIZ
 */
function myCart($carts, $proccess = null)
{
    if ($proccess == 'totalPrice')
    {
        $totals = 0;
        foreach ($carts as $key => $item)
        {
            $totals += ($item["priceNew"]) * $item["quantity"];

        }
        return $totals;
    } else
    {
        return "are you okey?";
    }
}



function getTitle ($title = NULL)
{
    if (! empty($title)) {
        return $title;
    }
    return ayar('title');
}
function getDescription ($description = NULL)
{
    if (! empty($description)) {
        return $description;
    }
    return ayar('description');
}
function getKeyword ($keyword = NULL)
{
    if (! empty($keyword)) {
        return $keyword;
    }
    return ayar('keyword');
}

function getImage ($logo = NULL)
{
    if (! empty($logo)) {
        return $logo ;
    }
    return url(image(ayar('logo')));
}
function getUrl ($url = NULL)
{
    if (! empty($url)) {
        return $url;
    }
    return ayar('url');
}

