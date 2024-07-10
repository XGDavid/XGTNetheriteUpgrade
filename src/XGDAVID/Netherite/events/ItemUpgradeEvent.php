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
#   (?) user: xgdav | 10/07/2024 7:40 PM
#

namespace XGDAVID\Netherite\events;

use pocketmine\event\player\PlayerEvent;
use pocketmine\item\Item;
use pocketmine\player\Player;

class ItemUpgradeEvent extends PlayerEvent
{

    private Item $diamondItem;
    private Item $netheriteItem;

    public function __construct(Player $player, Item $diamondItem, Item $netheriteItem)
    {
        $this->player = $player;
        $this->diamondItem = $diamondItem;
        $this->netheriteItem = $netheriteItem;
    }

    public function getDiamondItem(): Item
    {
        return $this->diamondItem;
    }

    public function getNetheriteItem(): Item
    {
        return $this->netheriteItem;
    }

    public function setDiamondItem(Item $diamondItem): void
    {
        $this->diamondItem = $diamondItem;
    }

    public function setNetheriteItem(Item $netheriteItem): void
    {
        $this->netheriteItem = $netheriteItem;
    }


}