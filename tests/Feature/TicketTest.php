<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;
use App\User;
use App\Ticket;

class TicketTest extends TestCase
{
    use RefreshDatabase;
    
    protected function setUp(): void
    {
        parent::setUp();
        
        $user = factory(User::class)->create();
        $this->actingAs($user);
        
    }
    
    public function testCreateTicket()
    {
       
        $response = $this->post('tickets', ['topic'=> 'testtopic', 'message'=> 'testmessage', 'status'=> 'Pending']);
        
        $response->assertStatus(200);
        $response->assertSee('ticket created');
    }
    
    public function testGetTicket()
    {
        $ticket = factory(Ticket::class)->create(['status'=>'CLOSED']);
        
        $response = $this->get("tickets/{$ticket->id}");
        $response->assertStatus(200);
        $response->assertSee($ticket->message);
    }
    
    public function testUpdateTicket()
    {
        $ticket = factory(Ticket::class)->create();
        $ticket_as_arr = $ticket->toArray();
        $ticket_as_arr['topic'] = 'updatedTopic';
        $ticket_as_arr['status'] = 'CLOSED';
        
        $response = $this->patch("tickets/{$ticket->id}", $ticket_as_arr);
        
        $updated_ticket = Ticket::find($ticket->id);
        
        $this->assertEquals($ticket->id, $updated_ticket->id);
        $this->assertEquals('updatedTopic', $updated_ticket->topic);
        $this->assertEquals('CLOSED', $updated_ticket->status);
        $response->assertRedirect('tickets');
    }
    
    public function testDeleteTicket()
    {
        $ticket = factory(Ticket::class)->create();
        $this->delete("tickets/{$ticket->id}");
        $updated_ticket = Ticket::find($ticket->id);
        $this->assertNull($updated_ticket);
    }
}
