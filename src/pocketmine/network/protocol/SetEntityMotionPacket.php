<?php

/*
 *
 *  _                       _           _ __  __ _             
 * (_)                     (_)         | |  \/  (_)            
 *  _ _ __ ___   __ _  __ _ _  ___ __ _| | \  / |_ _ __   ___  
 * | | '_ ` _ \ / _` |/ _` | |/ __/ _` | | |\/| | | '_ \ / _ \ 
 * | | | | | | | (_| | (_| | | (_| (_| | | |  | | | | | |  __/ 
 * |_|_| |_| |_|\__,_|\__, |_|\___\__,_|_|_|  |_|_|_| |_|\___| 
 *                     __/ |                                   
 *                    |___/                                                                     
 * 
 * This program is a third party build by ImagicalMine.
 * 
 * PocketMine is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author ImagicalMine Team
 * @link http://forums.imagicalcorp.ml/
 * 
 *
*/

namespace pocketmine\network\protocol;

#include <rules/DataPacket.h>


class SetEntityMotionPacket extends DataPacket
{
    const NETWORK_ID = Info::SET_ENTITY_MOTION_PACKET;


    // eid, motX, motY, motZ
    /** @var array[] */
    public $entities = [];

    public function clean()
    {
        $this->entities = [];
        return parent::clean();
    }

    public function decode()
    {
    }

    public function encode()
    {
        $this->reset();
        $this->putInt(count($this->entities));
        foreach ($this->entities as $d) {
            $this->putLong($d[0]); //eid
            $this->putFloat($d[1]); //motX
            $this->putFloat($d[2]); //motY
            $this->putFloat($d[3]); //motZ
        }
    }
}
