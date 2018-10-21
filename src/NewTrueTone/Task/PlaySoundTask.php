<?php

namespace NewTrueTone\Task;

use pocketmine\scheduler\Task;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\math\Vector3;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\network\mcpe\protocol\PlaySoundPacket;

use NewTrueTone\PlaySound;

class PlaySoundTask extends Task{
	/**
	 *
	 * @var RankManager
	 */
	private $plugin;
	private $player;
	
	public function __construct(PlaySound $plugin) {
		$this->plugin = $plugin;
	}
	
	public function onRun(int $currentTick){
		$this->plugin->StartSound();
	}
}
