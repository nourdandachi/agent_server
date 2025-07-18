<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use  App\Services\AgentService;
use App\Http\Controllers\Controller;
use Database\Seeders\AgentSeeder;
use App\Models\Scopes\AncientScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

#[ScopedBy([AncientScope::class])]

class AgentController extends Controller
{
    function getAllAgents($id = null)
    {
        $agent = AgentService::getAllAgents($id);
        return $this->responseJSON($agent);
    }

    function addOrUpdateAgent(Request $request, $id = null)
    {
        $agent = new Agent();
        if ($id) {
            $agent = AgentService::getAllAgents($id);
        }

        $data = $request->all();

        $agent = AgentService::createOrUpdateAgent($data, $agent);
        if ($agent) {
            return $this->responseJSON($agent);
        }
        return $this->responseJSON($agent, "error", 400);
    }

    function getChatbotAgents()
    {
        $agents = AgentService::getChatbotAgents();

        if (!$agents) {
            return $this->responseJSON(null, "error", 400);
        }

        return $this->responseJSON($agents);
    }

    function getHighAccuracyAgents()
    {
        $agents = AgentService::getHighAccuracyAgents();

        if (!$agents) {
            return $this->responseJSON(null, "error", 400);
        }

        return $this->responseJSON($agents);
    }

    function countVoiceAssistantAgents()
    {
        $agents = AgentService::countVoiceAssistantAgents();

        if (!$agents) {
            return $this->responseJSON(null, "error", 400);
        }

        return $this->responseJSON($agents);
    }


    function deleteAgent($id)
    {
        $agent = Agent::find($id);

        $agent->delete();
    }

    function destroyAgent($id)
    {
        Agent::destroy($id);
    }

    function deleteVersions()
    {
        Agent::where("version", "v1")->delete();
    }

    function forceDelete($id)
    {
        $agent = Agent::find($id);
        $agent->forceDelete();
    }


    #[Scope]
    protected function accurate(Builder $query): void
    {
        $query->where('accuracy', '>', 90);
    }
}
