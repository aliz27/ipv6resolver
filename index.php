<?php
if ($_GET['host'])
{
  $host = $_GET['host'];

//  $m = new Memcached();
//  $m->configureSasl("EMz8Ras7qpvW6JHXjZ6QDLc", "EMz8Ras7qpvW6JHXjZ6QDLc");
//  $m->addServer("127.0.0.1", 11211);

//  if (!($code = $m->get($host))) {
//    if ($m->getResultCode() == Memcached::RES_NOTFOUND) {
      $ipv6 = dns_get_record($host, DNS_AAAA);

      if (isset($ipv6['0']['ipv6'])) {
        $code = "200";
        $ttl = $ipv6['0']['ttl'];
      } else {
        $ipv4 = dns_get_record($host, DNS_A);
        if (isset($ipv4['0']['ip'])) {
          $code = "100";
          $ttl = $ipv4['0']['ttl'];
        } else {
          $code = "0";
          $ttl = "0";
        }
      }
//      $m->set($host, $code, $ttl);
//    }
//  }
  echo $code;
}
?>
