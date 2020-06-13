<?php
/**
 *
 * User: huangwalker
 * Date: 2020/6/10
 * Time: 9:57
 * Email: <huangwalker@qq.com>
 */

//轮询
class PollAlgo
{
    //要负载的服务器
    private static $servers = [
        "192.168.1.2",
        "192.168.1.3",
        "192.168.1.4",
        "192.168.1.5",
    ];

    //记录当前服务器的下标，便于轮询
    private static $serverIndex = 0;

    public function run()
    {
        $server_map = [];

        for ($i=0;$i< 100000;$i++) {
            $server = $this->randomOneByOne();

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
     * 轮询获取服务器
     * @return mixed
     * @author clh
     * @time 2020/6/10
     */
    private function randomOneByOne()
    {
        self::$serverIndex++;
        if (self::$serverIndex == count(self::$servers)) {
            self::$serverIndex = 0;
        }

        $server = self::$servers[self::$serverIndex];
        return $server;
    }
}

$obj = new PollAlgo();
$obj->run();