<?php
/**
 * Created by PhpStorm.
 * User: joseneto
 * Date: 02/02/17
 * Time: 18:20
 */

namespace Figview\Transformers;

use League\Fractal\TransformerAbstract;
use Figview\Entities\IotEnv;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class IoTEnvTransformer extends TransformerAbstract
{

    /**
     * Default includes of nested data.
     *
     * @var array
     */
    protected $defaultIncludes = [
        'orion',
        'idas',
        'userowner',
        'members',
        'devicemodels',
        'ancestors',
        'descendants'
    ];

    public function transform(IotEnv $iotenv)
    {
        return [
            'id' => $iotenv->id,
            'name' => $iotenv->name,
            'Fiware_Service' => $iotenv->Fiware_Service,
            'content_type' => $iotenv->content_type,
            'Fiware_ServicePath' => $iotenv->Fiware_ServicePath,
            'X_Auth_Token' => $iotenv->X_Auth_Token,
            'user_id' => $iotenv->user_id,
            'orion_id' => $iotenv->orion_id,
            'idas_id' => $iotenv->idas_id,
            'isMember' => $iotenv->user_id != Authorizer::getResourceOwnerId(),
            'created_at' => $iotenv->created_at
        ];

    }

    public function includeOrion(IotEnv $iotenv)
    {
        $orion = $iotenv->orion;
        $transformer = new OrionTransformer();
        $transformer->setDefaultIncludes(['user']);

        return $this->item($orion, $transformer);
    }

    public function includeIdas(IotEnv $iotenv)
    {
        $idas = $iotenv->idas;
        $transformer = new IdasTransformer();
        $transformer->setDefaultIncludes(['user']);
        
        return $this->item($idas, $transformer);
    }

    public function includeUserOwner(IotEnv $iotenv)
    {
        $user = $iotenv->user;

        return $this->item($user, new UserTransformer);
    }

    public function includeMembers(IotEnv $iotenv)
    {
        $members = $iotenv->members;

        return $this->collection($members, new UserTransformer());

    }

    public function includeDeviceModels(IotEnv $iotenv)
    {
        $devicemodels = $iotenv->queryDeviceModels;

        return $this->collection($devicemodels, new DeviceModelTransformer());
    }

    public function includeAncestors(IotEnv $iotenv)
    {
        $ancestors = $iotenv->queryAncestors;

        return $this->collection($ancestors, new ContextTreePathAncestorTransformer());
    }

    public function includeDescendants(IotEnv $iotenv)
    {
        $descendants = $iotenv->queryDescendants;

        return $this->collection($descendants, new ContextTreeDescendantTransformer());
    }


}