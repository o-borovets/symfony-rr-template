# Example Module

:warning: This is an example of symfony module designed for quick development purposes. Please note that it is **not**
intended to
demonstrate best programming practices or serve as a production-ready solution.

## Overview

The example module provides a basic template that can be used as a starting point for creating new modules. It includes
pre-defined api endpoints, and classes to demonstrate various concepts.

## Contents

- [Contributing](#contributing)
- [License](#license)

## Layer structure

The main idea of this module is to take DDD ideas and turn them into RAD like by reusing DTOs from different layers.
This reduces the amount of boilerplate and speeds up initial development. The main idea of this module is to take DDD
ideas and turn them into RAD like by reusing DTOs from different layers. This reduces the amount of boilerplate and
speeds up initial development.
> :warning: **Warning:** Be careful with this approach because it has disadvantages in the long run

### Directory structure

| Directory      | Description                                                                                                                                                                                              |
|----------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| Domain         | Contains code related to Application and domain layers. Entities, factories and various services with their implementations. <br> Should not contain code that interacts with other services or modules. |
| Api/Cli        | Front controllers for the module. Can use DTOs from the domain layer.                                                                                                                                    |
| Infrastructure | Infrastructure level code                                                                                                                                                                                |
| Adapter        | These are adapters for using front-controllers of other modules                                                                                                                                          |


Api and Cli layer do not have its own DTO and reuse DTO from

## Contributing

Contributions to this example module are not actively solicited, as it primarily serves as a reference for quick
development. However, if you have any suggestions or improvements, feel free to open a pull request or issue on the
repository. Please note that the maintainers may not actively review or merge these contributions.

## License

This example module is provided under the [MIT License](LICENSE). Feel free to modify and distribute it as per the terms
of the license. However, please remember that this module is intended for demonstration purposes and not as a
production-ready solution. Use it at your own discretion and risk.
