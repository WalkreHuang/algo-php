<?php
/**
 *
 * User: huangwalker
 * Date: 2020/6/10
 * Time: 11:14
 * Email: <huangwalker@qq.com>
 */

//IP hash
//根据请求端的 ip 进行哈希计算来决定请求到哪一台服务器的方式。这种方式可以保证同一个用户的请求落在同一个服务上。确保session不会丢失
class IPHashAlgo
{
    //要负载的服务器
    private static $servers = [
        "192.168.1.2",
        "192.168.1.3",
        "192.168.1.4",
        "192.168.1.5",
    ];

    public function run()
    {
        $server_map = [];

        //客户端ip
        $ip = '223.23.45.87';
        for ($i=0;$i< 100;$i++) {
            $server = $this->ipHash($ip);

            $count = $server_map[$server] ?? null;
            if ($count == null) {
                $count = 1;
            } else {
                $count++;
            }

            $server_map[$server] = $count;
        }

        //请求分发的结果
        foreach ($server_map as $server => $count) {
            echo sprintf("IP:%s,次数:%d", $server, $count).PHP_EOL;
        }
    }

    /**
     * 根据客户端ip地址获取服务器
     * @param  $ip
     * @return mixed
     * @author clh
     * @time 2020/6/10
     */
    private function ipHash($ip)
    {
        $server_index = $this->getIPHashCode($ip) % count(self::$servers);
        $server = self::$servers[$server_index];
        return $server;
    }

    private function getIPHashCode($ip)
    {
        $str_len = strlen($ip);
        $ascii = 0;
        for ($i=0;$i<$str_len;$i++) {
            $ascii += ord($ip[$i]);
        }

        return $ascii;
    }
}

$obj = new IPHashAlgo();
$obj->run();