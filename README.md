# Metadata Core Bundle
This repository contains the shared core functionality that is used in several other metadata related bundles

This does not mean that functionality from this bundle can not be used in isolation. The bundle is however always included as a 
dependency in other bundles.

## Shared entities:

1. MetadataLanguage - the list of languages that can be configured to be enabled or disabled per installation
2. MetadataContext  - A relation to many entities that specifies in what context metadata is relevant

## Shared enumerations:

To keep discriminators or filters consistent and typed they are reused over several bundles

## Repository helper methods 

## Common interfaces

