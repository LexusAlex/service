"use client";

import {useDispatch, useSelector} from "react-redux";
import {selectorProductAmount} from "@/redux/cart/selector";

const Product2 = () => {
  const dispatch = useDispatch();
  return <div>
    <button onClick={() => dispatch()} >+</button>
    <button>-</button>
  </div>;
}

export default function Home() {
  const Product = useSelector((state) => selectorProductAmount(state,"123"));
  return (
    <main>
      {Product}
      <Product2 />
    </main>
  )
}
