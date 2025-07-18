<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgentController;

Route::get("agents/{id?}", [AgentController::class, "getAllAgents"]);
Route::post("add_update_agent", [AgentController::class, "addOrUpdateAgent"]);
Route::get("chatbot_agents", [AgentController::class, "getChatbotAgents"]);
Route::get("high_accuracy", [AgentController::class, "getHighAccuracyAgents"]);
Route::get("count_voice_assistant_agents", [AgentController::class, "countVoiceAssistantAgents"]);
Route::get("delete/{id}", [AgentController::class, "deleteAgent"]);
Route::get("destroy/{id}", [AgentController::class, "destroyAgent"]);
Route::get("delete_versions", [AgentController::class, "deleteVersions"]);
Route::get("force_delete/{id}", [AgentController::class, "forceDelete"]);