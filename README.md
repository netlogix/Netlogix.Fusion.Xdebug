# Netlogix Fusion Xdebug

This package provides a simple Fusion prototype that contains a call to `xdebug_break()`
for easier debugging of fusion prototypes.

**A working xdebug setup is assumed!**

## Install package
`composer require netlogix/fusion-xdebug`

## Usage

The prototype can be used as `@process`:
```
prototype(Foo) < prototype(Neos.Fusion:Component) {
  someprop = 'bar'

  renderer = afx`
     <h1>Foo</h1>
  `
  
  @process.xdebug = Netlogix.Fusion.Xdebug:Break {
    someOtherValue = ${request.format}
  }
}
```

Or directly as a prototype:
```
prototype(Foo) < prototype(Neos.Fusion:Component) {
  someprop = 'bar'

  renderer = Netlogix.Fusion.Xdebug:Break {
    someprop = ${props.someprop}
    someOtherValue = ${request.format}
  }
}
```

Or inside of afx:
```
prototype(Foo) < prototype(Neos.Fusion:Component) {
  someprop = 'bar'

  renderer = afx`
    <Netlogix.Fusion.Xdebug:Break someprop={props.someprop} someOtherValue={request.format} />
  `
}
```

Prior to the breakpoint, the following variables are declared:
* `$context`: contains the current Fusion context available to the prototype
* `$data`: contains the data passed to the prototype

![phpstorm-debugger](https://user-images.githubusercontent.com/15905038/157396389-dce4ee59-ee36-43c8-a4c8-421f88334336.jpeg)
