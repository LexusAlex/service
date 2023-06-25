'use client'

import {createContext, useCallback, useContext, useState} from "react";


const Toogle = ({initialValue}) => {
  const [isOn, setIsOn] = useState(initialValue);
  return (
    <div>
      <button onClick={() => setIsOn(!isOn)}>Switch</button>
      {isOn && <span>on</span> }
      {!isOn && <span>off</span> }
    </div>
  )
}

const ToogleContext = createContext(false);
const ToogleCompound = ({children, initialValue}) => {
  const [isOn, setIsOn] = useState(initialValue);
  return <ToogleContext.Provider value={{isOn, setIsOn}}>{children}</ToogleContext.Provider>
}


ToogleCompound.TextOn = () => {
  const {isOn} = useContext(ToogleContext);

  if (!isOn) {
    return null;
  }

  return <span>on</span>
}

ToogleCompound.TextOff = () => {
  const {isOn} = useContext(ToogleContext);

  if (isOn) {
    return null;
  }

  return <span>off</span>
}

ToogleCompound.SwitchButton = () => {
  const {setIsOn} = useContext(ToogleContext);
  return <button onClick={() => setIsOn((isOn) => !isOn)}>switch</button>
}


const MenuContext = createContext(false);

const MenuAccordion = ({children}) => {
  const [activeGroup, setActiveGroup] = useState();

  const switchGroup = useCallback((title) => {
    setActiveGroup((activeTitle) => activeTitle === title ? undefined : title);
  },[]);
  return <MenuContext.Provider value={{activeGroup, switchGroup}}>{children}</MenuContext.Provider>
}

MenuAccordion.Group = function MenuGroup({children, title}) {
  const {activeGroup, switchGroup} = useContext(MenuContext);
  return (
    <div>
      <button onClick={() => switchGroup(title) }>{title}</button>
      {activeGroup === title && <div>{children}</div>}
    </div>
  );
};

MenuAccordion.Item = function MenuItem({children, title}) {
  return <div>{title}</div>
}

// Render Prop

const Layout = ({renderHeader, renderContent, renderFooter}) => {
  const [isOpen,setIsOpen] = useState();
  return (
    <div>
      <div className="header">{renderHeader?.()}</div>
      <button onClick={() => {setIsOpen(!isOpen)}}> Click me</button>
      <div className="content">{renderContent?.()}</div>
      <div className="footer">{renderFooter?.(isOpen)}</div>
    </div>
  )
}

// Hoc

const useIsAutorized = () => {
  const [isAuth, setAuth] = useState(false);
  const Switch = useCallback(() => {
    setAuth((current) => !current);
  }, []);
  return {isAuth, Switch};
}

const AutorizeComponent = () => {
  return (<div>Только для авторизованных</div>);
}

const UntorizeComponent = () => {
  return (<div>Только для не авторизованных</div>);
}

export default function Home() {
  const {isAuth, Switch} = useIsAutorized();
  return (
    <main>
      page
      <Toogle initialValue={false} />
      <ToogleCompound initialValue={false}>
        <ToogleCompound.TextOn/>
        <ToogleCompound.TextOff/>
        <ToogleCompound.SwitchButton/>
      </ToogleCompound>

      <MenuAccordion>
        <MenuAccordion.Item title={"Главная"}></MenuAccordion.Item>
        <MenuAccordion.Group title={"Фильмы"}>
          <MenuAccordion.Item title={"Первый фильм"}></MenuAccordion.Item>
          <MenuAccordion.Item title={"Второй фильм"}></MenuAccordion.Item>
          <MenuAccordion.Item title={"Третий фильм"}></MenuAccordion.Item>
        </MenuAccordion.Group>
        <MenuAccordion.Item title={"О нас"}></MenuAccordion.Item>
      </MenuAccordion>

      <Layout renderHeader={() => <header>header</header>}
              renderContent={() => <section>content</section>}
              renderFooter={(isOpen) => {isOpen ? <footer>footer</footer> : ''}}>
      </Layout>

      <button onClick={Switch}>{isAuth ? 'Logout': 'Login'}</button>
      {isAuth ? <AutorizeComponent/> : <UntorizeComponent/>}

    </main>
  )
}
