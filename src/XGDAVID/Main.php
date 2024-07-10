<?php
#
# __   _______ _______ _____            __      _____
# \ \ / / ____|__   __/ ____|           \ \    / /__ \
#  \ V / |  __   | | | |     ___  _ __ __\ \  / /   ) |
#   > <| | |_ |  | | | |    / _ \| '__/ _ \ \/ /   / /
#  / . \ |__| |  | | | |___| (_) | | |  __/\  /   / /_
# /_/ \_\_____|  |_|  \_____\___/|_|  \___| \/   |____|
#
#   @author XGDAVID
#   Copyright (c) XGTeam & GCStaff - 2024
#   !file XGDAVID
#   (?) user: xgdav | 10/07/2024 8:09 PM
#

namespace XGDAVID;

use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use XGDAVID\Netherite\NetheriteManager;

class Main extends PluginBase
{
    public static Config $config;
    const VERSION = "1.0.0";

    public function onEnable(): void
    {
        $this->init();
    }

    private function init(): void
    {
        $this->saveResource("config.yml");
        self::$config = new Config($this->getDataFolder() . "config.yml", Config::YAML);

        if (self::$config->get("version") != self::VERSION) {
            $this->getServer()->getLogger()->alert($this->getName() . " Config is outdated!");
            $this->getServer()->getPluginManager()->disablePlugin($this);
            return;
        }

        if (self::$config->get("xp") and self::$config->get("xp-take") > self::$config->get("xp-need")) {
            $this->getServer()->getLogger()->alert($this->getName() . " Config error, set 'xp-take' and 'xp-need' correct!");
            $this->getServer()->getPluginManager()->disablePlugin($this);
            return;
        }
        new NetheriteManager($this);
    }
}