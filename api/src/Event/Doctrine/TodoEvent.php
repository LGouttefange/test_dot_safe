<?

namespace Event\Doctrine;

use App\Entity\Todo;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class TodoEvent implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return array(
            Events::prePersist,
            Events::postUpdate,
        );
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $this->index($args);
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if ($entity instanceof Todo) {
            $entityManager = $args->getObjectManager();
            dd($entity);
            // ... do something with the Product
        }
    }

    public function index(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        // perhaps you only want to act on some "Product" entity
        if ($entity instanceof Todo) {
            $entityManager = $args->getObjectManager();
            dd($entity);
            // ... do something with the Product
        }
    }
}
