<?php
$DOMAIN = 'http://YOURDOMAIN';

if ( !empty($_POST) )
{
        if($_POST['sprunge'])
        {
                $md5 = md5($_POST['sprunge']);
                file_put_contents("data/".$md5.".txt", $_POST['sprunge']);
                echo $DOMAIN."?id=".$md5."\n";
        }
} else if( !empty($_GET) ) {
        if($_GET['id'])
        {
                $data = file_get_contents("data/".basename($_GET['id']).".txt");
                $data = str_replace("<?php", "", $data);
                echo '
<!DOCTYPE html><html><head><style>body { background-color: #f8f8f8;}</style>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.5.0/styles/github.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.5.0/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<pre><code>'.($data).'</code></pre>
</head><body>';
        }
} else {
        echo "
echo 'XXX' | curl -F 'sprunge=<-' $DOMAIN
";
}
