CQRS Commands
=============

Commands are used to trigger state changes in the domain. You get no result, when you
invoke a command, but you can listen on a Domain Event, that signals that a state has
been changed. Each command should have a corresponding event.
Commands are named in the imperative: DoSomethingCommand.

Modeling by example - czy sie udalo ?

Zamiast uzywania obiektow domenowych

Intencje klas


// opisac czym sa commendy - intencje - opis dla QA
// komenda repzentuje intencje
// command bus - laczy command z handlerem
//jeden handler obsluguje jeden command
//handler - interpretacja intencji



Podział na werstwy

- application
- ui
- domain
- intfrastructure
