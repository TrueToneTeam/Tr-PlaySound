<?php

namespace NewTrueTone;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\tile\Tile;
use pocketmine\command\{Command, CommandSender, CommandExecutor, ConsoleCommandSender};
use pocketmine\event\player\{PlayerMoveEvent, PlayerQuitEvent, PlayerJoinEvent, PlayerRespawnEvent, PlayerDropItemEvent, PlayerInteractEvent, PlayerItemUseEvent, PlayerChatEvent};
use pocketmine\item\{Item, enchantment\Enchantment, enchantment\EnchantmentInstance};
use pocketmine\network\mcpe\protocol\PlaySoundPacket;

use NewTrueTone\Task\PlaySoundTask;

class PlaySound extends PluginBase implements Listener{
	private static $instance = null;
	
	public static function getInstance(){
		return self::$instance;
	}

	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		
		/* 플러그인 사용안내 */
		$this->getLogger()->critical("Tr-PlaySound vX | §e오르카 제작"); 
		$this->getLogger()->notice("해당 플러그인은 TrueTone 서버 전용 플러그인으로 외부로 유출하실수 없습니다."); 
		$this->getLogger()->notice("해당 플러그인은 §eTrueTone Inc.§b 라이센스로 보호받고 있습니다.");
		/* 플러그인 사용안내 */
		
		/* 기타 */
		$this->getScheduler()->scheduleDelayedRepeatingTask(new PlaySoundTask($this), 10000, 10000);
		/* 기타 */
	}
	
	public function onJoin(PlayerJoinEvent $player){
		$packet = new PlaySoundPacket();
		$packet->soundName = "record.11";
		$packet->x = $player->getPlayer()->getX();
		$packet->y = $player->getPlayer()->getY();
		$packet->z = $player->getPlayer()->getZ();
		$packet->volume = 100;
		$packet->pitch = 1;
		$player->getPlayer()->dataPacket($packet);
	}
	
	public function StartSound(){
		foreach ( $this->getServer()->getOnlinePlayers() as $players ){
			/* 테스트 */
			$packet = new PlaySoundPacket();
			$packet->soundName = "record.11";
			$packet->x = $players->getPlayer()->getX();
			$packet->y = $players->getPlayer()->getY();
			$packet->z = $players->getPlayer()->getZ();
			$packet->volume = 100;
			$packet->pitch = 1;
			$players->getPlayer()->dataPacket($packet);
			/* 테스트 */
		}
	}
}
