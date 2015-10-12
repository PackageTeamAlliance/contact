<?php

namespace Pta\Contact\Repositories;

use Cartalyst\Support\Traits;
use Pta\Contact\Models\Message;
use Illuminate\Container\Container;
use Pta\Contact\Repositories\ContactRepositoryInterface;

/**
* Repo
*/
class ContactRepository implements ContactRepositoryInterface
{
    use Traits\ContainerTrait, Traits\EventTrait, Traits\RepositoryTrait;

    public function __construct(Container $app)
    {
        $this->setContainer($app);
        
        $this->setDispatcher($app['events']);
    
        $this->setModel(get_class($app[Message::class]));
    }


        /**
     * {@inheritDoc}
     */
    public function store($id, array $input)
    {
        return !$id ? $this->create($input) : $this->update($id, $input);
    }

      /**
     * {@inheritDoc}
     */
    public function create(array $input)
    {
        
        // Create a new contact
        $contact = $this->createModel();
        
        // Fire the 'ninjaparade.contact.contact.creating' event
        if ($this->fireEvent('pta.contact.creating', [$input]) === false) {
            return false;
        }
        
        $data = array_except($input, ['_token']);
 
        // Save the contact
        $contact->fill($data)->save();
        
        // Fire the 'ninjaparade.contact.contact.created' event
        $this->fireEvent('pta.contact.created', [$contact]);
        
        return $contact;
    }
    
    /**
     * {@inheritDoc}
     */
    public function update($id, array $input)
    {
        
        // Get the contact object
        $contact = $this->find($id);
        
        // Fire the 'ninjaparade.contact.contact.updating' event
        if ($this->fireEvent('pta.contact.updating', [$contact, $input]) === false) {
            return false;
        }
        
        $contact->fill($data)->save();
        
        // Fire the 'ninjaparade.contact.contact.updated' event
        $this->fireEvent('pta.contact.updated', [$contact]);
        
        return $contact;
    }
}
