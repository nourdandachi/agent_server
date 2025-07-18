<?php

namespace App\Services;

use App\Models\Agent;

class AgentService
{

    static function getAllAgents($id = null)
    {
        if (!$id) {
            return Agent::all();
        }
        return Agent::find($id);
    }

    static function createOrUpdateAgent($data, $agent)
    {
        $agent->name = $data["name"] ?? $agent->name;
        $agent->type = $data["type"] ?? $agent->type;
        $agent->model = $data["model"] ?? $agent->model;
        $agent->accuracy = $data["accuracy"] ?? $agent->accuracy;
        $agent->status = $data["status"] ?? $agent->status;
        $agent->deployed_at = $data["deployed_at"] ?? $agent->deployed_at;
        $agent->version = $data["version"] ?? $agent->version;
        
        
        $agent->save();
        return $agent;
    }

    static function getChatbotAgents(){
        return Agent::where("type", "chatbot")->get();
    }

    static function getHighAccuracyAgents(){
        return Agent::where("accuracy", ">", 100)->firstOrFail();
    }

    static function countVoiceAssistantAgents(){
        return Agent::where("type" , "voice-assistant")->count();
    }
}
